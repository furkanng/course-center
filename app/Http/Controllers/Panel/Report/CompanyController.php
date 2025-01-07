<?php

namespace App\Http\Controllers\Panel\Report;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PageVisit;
use App\Models\UserCompanyContact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(Request $request): view
    {
        $filter = $request->input('filter');

        $query = Company::query();

        if ($filter) {
            $query->where(function ($query) use ($filter) {
                $query->where('name', 'LIKE', '%' . $filter . '%')
                    ->orWhere('address', 'LIKE', '%' . $filter . '%')
                    ->orWhere('phone', 'LIKE', '%' . $filter . '%')
                    ->orWhere('city', 'LIKE', '%' . $filter . '%')
                    ->orWhere('district', 'LIKE', '%' . $filter . '%');
            });
        }

        $mostVisited = PageVisit::query()->select(
            'seo_link',
            DB::raw('COUNT(*) as total_visits'),
            DB::raw('COUNT(DISTINCT ip_address) as unique_visits')
        )
            ->groupBy('seo_link')
            ->orderByDesc('total_visits')
            ->get();

        $companies = $query->paginate(20);

        $companies->getCollection()->transform(function ($company) use ($mostVisited) {
            $visit = $mostVisited->firstWhere('seo_link', $company->link);
            $company->total_visits = $visit ? $visit->total_visits : 0;
            $company->unique_visits = $visit ? $visit->unique_visits : 0;
            return $company;
        });

        // Total visits'e göre sıralama
        $companies = $companies->setCollection(
            $companies->getCollection()->sortByDesc('total_visits')->values()
        );

        return view("panel.pages.report.company.index", compact(["companies"]));
    }

    public function show($companyId): View
    {
        $company = Company::findOrFail($companyId);

        // Toplam ve benzersiz ziyaretleri çek
        $visitData = PageVisit::query()
            ->select(
                DB::raw('COUNT(*) as total_visits'),
                DB::raw('COUNT(DISTINCT ip_address) as unique_visits')
            )
            ->where('seo_link', $company->link)
            ->first();

        $company->total_visits = $visitData->total_visits ?? 0;
        $company->unique_visits = $visitData->unique_visits ?? 0;

        // Aylık ziyaret ve talepler için veriler
        $monthlyVisits = PageVisit::query()
            ->select(
                DB::raw('DATE_FORMAT(visited_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total_visits')
            )
            ->where('seo_link', $company->link)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_visits', 'month');

        $monthlyRequests = $company->contact()
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('COUNT(*) as total_requests')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_requests', 'month');


        // Verileri formatla
        $months = collect(range(1, 12))->map(function ($month) {
            return date('Y-m', mktime(0, 0, 0, $month, 1));
        });

        $visitData = $months->map(fn($month) => $monthlyVisits[$month] ?? 0);
        $requestData = $months->map(fn($month) => $monthlyRequests[$month] ?? 0);

        $topCities = UserCompanyContact::query()
            ->where("company_id", $companyId) // Şirket ID'sine göre filtreleme
            ->select('customer_city', DB::raw('COUNT(*) as total_requests'))
            ->groupBy('customer_city')
            ->orderByDesc('total_requests')
            ->limit(5)
            ->get();

        $cityLabels = $topCities->pluck('customer_city')->toArray();
        $cityData = $topCities->pluck('total_requests')->toArray();

        $monthContactUser = UserCompanyContact::query()
            ->where("company_id", $companyId)
            ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->get();

        $monthlyTotalVisits = PageVisit::query()
            ->selectRaw('MONTH(visited_at) as month, YEAR(visited_at) as year, COUNT(*) as total_visits')
            ->where('visited_at', '>=', Carbon::now()->subMonths(6)) // Son 6 ay
            ->groupBy('month', 'year') // Ay ve yıl gruplaması
            ->orderByRaw('year, month') // Yıl ve ay sırasına göre sıralama
            ->get();

        $labels = $monthlyTotalVisits->map(function ($item) {
            return Carbon::create($item->year, $item->month, 1)->format('F'); // Ay ve yıl formatında etiket
        });

        $data = $monthlyTotalVisits->pluck('total_visits'); // Ziyaret verileri

        return view('panel.pages.report.company.show',
            compact([
                'company',
                'visitData',
                'requestData',
                'cityLabels',
                'cityData',
                'topCities',
                'monthContactUser',
                'labels',
                'data'
            ]));
    }
}
