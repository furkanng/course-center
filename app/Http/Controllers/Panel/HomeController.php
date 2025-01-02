<?php

namespace App\Http\Controllers\Panel;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Order;
use App\Models\PageVisit;
use App\Models\User;
use App\Models\UserCompanyRequest;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(): view
    {
        $guestUserCount = User::query()->where('role', UserRole::GUEST)
            ->where('status', true)
            ->count();

        $companyUserCount = User::query()->where('role', UserRole::COMPANY)
            ->where('status', true)
            ->count();

        $companiesCount = Company::query()->where('status', true)->count();

        $userCompanyRequestCount = UserCompanyRequest::query()->where("status", UserStatus::PENDING)->count();

        $mostVisited = PageVisit::query()->select(
            'seo_link',
            DB::raw('COUNT(*) as total_visits'),
            DB::raw('COUNT(DISTINCT ip_address) as unique_visits'),
        )
            ->groupBy('seo_link')
            ->orderByDesc('total_visits')
            ->take(5)
            ->get();

        $companies = Company::query()->whereIn('link', $mostVisited->pluck('seo_link'))->get();

        $visits = $companies->map(function ($company) use ($mostVisited) {
            $visit = $mostVisited->firstWhere('seo_link', $company->link);
            $company->total_visits = $visit ? $visit->total_visits : 0;
            $company->unique_visits = $visit ? $visit->unique_visits : 0;
            return $company;
        });

        $chartData = $this->prepareChartData();
        $totalIncrease = array_sum($chartData['total_increase']);
        $uniqueIncrease = array_sum($chartData['unique_increase']);

        $salesChartData = $this->monthlySales();

        return view("panel.pages.home", compact([
            'guestUserCount',
            'companyUserCount',
            'userCompanyRequestCount',
            'companiesCount',
            'visits',
            'chartData',
            'totalIncrease',
            'uniqueIncrease',
            'salesChartData'
        ]));
    }

    public function cache(): RedirectResponse
    {
        Artisan::call('optimize:clear');

        return redirect()->back()->with(["success" => "Cache temizlendi"]);
    }

    private function prepareChartData(): array
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $monthlyData = PageVisit::selectRaw('MONTH(visited_at) as month, COUNT(*) as total_visits, COUNT(DISTINCT ip_address) as unique_visitors')
            ->whereYear('visited_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $labels = [];
        $totalVisits = [];
        $uniqueVisitors = [];
        $totalIncrease = [];
        $uniqueIncrease = [];

        $previousTotal = 0;
        $previousUnique = 0;

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = Carbon::create()->month($month)->format('F');

            if ($month > $currentMonth) {
                $totalVisits[] = null;
                $uniqueVisitors[] = null;
                $totalIncrease[] = null;
                $uniqueIncrease[] = null;
                continue;
            }

            $data = $monthlyData->get($month, ['total_visits' => 0, 'unique_visitors' => 0]);

            $totalVisits[] = $data['total_visits'];
            $uniqueVisitors[] = $data['unique_visitors'];

            $totalIncrease[] = max(0, $data['total_visits'] - $previousTotal);
            $uniqueIncrease[] = max(0, $data['unique_visitors'] - $previousUnique);

            $previousTotal = $data['total_visits'];
            $previousUnique = $data['unique_visitors'];
        }

        return [
            'labels' => $labels,
            'total_visits' => $totalVisits,
            'unique_visitors' => $uniqueVisitors,
            'total_increase' => $totalIncrease,
            'unique_increase' => $uniqueIncrease,
        ];
    }

    private function monthlySales(): array
    {
        $currentYear = Carbon::now()->year;

        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(price) as total_sales')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        $labels = [];
        $sales = [];

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = Carbon::create()->month($month)->format('F'); // Ay adları
            $sales[] = $monthlySales->get($month)->total_sales ?? 0; // Satış verisi yoksa 0
        }

        return [
            'SalesChartData' => [
                'labels' => $labels,
                'sales' => $sales,
            ]
        ];
    }
}
