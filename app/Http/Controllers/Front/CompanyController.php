<?php

namespace App\Http\Controllers\Front;

use App\Enums\SeoPrefix;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Feature;
use App\Service\Helper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(Request $request): View
    {
        $query = Company::query()->where("status", true);

        $query = $this->applyFilters($query, $request);

        $companies = $query->paginate(20)->appends($request->query());

        return view("front.pages.company.index", compact("companies"));
    }

    /**
     * Filtreleri uygula.
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    private function applyFilters(Builder $query, Request $request): Builder
    {
        if ($request->filled('search')) {
            $search = $request->input('search');
            $searchUpper = mb_strtoupper($search, 'UTF-8');

            $query->where(function($q) use ($search, $searchUpper) {
                $q->whereRaw('name COLLATE utf8mb4_turkish_ci LIKE ? OR UPPER(name) COLLATE utf8mb4_turkish_ci LIKE ?', ['%' . $search . '%', '%' . $searchUpper . '%'])
                    ->orWhereRaw('city COLLATE utf8mb4_turkish_ci LIKE ? OR UPPER(city) COLLATE utf8mb4_turkish_ci LIKE ?', ['%' . $search . '%', '%' . $searchUpper . '%'])
                    ->orWhereRaw('district COLLATE utf8mb4_turkish_ci LIKE ? OR UPPER(district) COLLATE utf8mb4_turkish_ci LIKE ?', ['%' . $search . '%', '%' . $searchUpper . '%']);
            });
        }

        if ($request->filled('courses')) {
            $query->whereHas('courses', function ($q) use ($request) {
                $q->whereIn('name', $request->input('courses'));
            });
        }

        if ($request->filled('city')) {
            $city = $request->input('city');
            $cityUpper = mb_strtoupper($city, 'UTF-8');
            $query->whereRaw('city COLLATE utf8mb4_turkish_ci LIKE ? OR UPPER(city) COLLATE utf8mb4_turkish_ci LIKE ?', ['%' . $city . '%', '%' . $cityUpper . '%']);
        }

        if ($request->filled('district')) {
            $district = $request->input('district');
            $districtUpper = mb_strtoupper($district, 'UTF-8');
            $query->whereRaw('district COLLATE utf8mb4_turkish_ci LIKE ? OR UPPER(district) COLLATE utf8mb4_turkish_ci LIKE ?', ['%' . $district . '%', '%' . $districtUpper . '%']);
        }

        return $query;
    }


    public function show($seoLink): View
    {
        $link = Helper::parseUrl(SeoPrefix::COMPANY->value, $seoLink);

        $company = Company::query()->where('link', $link)->firstOrFail();

        $features = Feature::query()->where("status", true)->get();

        $companyFeatures = $company->features()->pluck('feature_id')->toArray();

        $mainMenus = $features->where('group_id', 0);

        $subMenus = $features->where('group_id', '!=', 0);

        $menuStructure = $mainMenus->map(function ($mainMenu) use ($subMenus) {
            $mainMenu->subMenus = $subMenus->where('group_id', $mainMenu->id);
            return $mainMenu;
        });

        $relatedCompany = Company::query()
            ->where('company_type', $company->company_type)
            ->limit(10)
            ->get();

        $comments = $company->comments;

        $averageRating = $comments->avg('rating');

        $totalReviews = $comments->count();

        $isFavorite = false;

        if (Auth::check()) {
            $isFavorite = auth()->user()->favorite()->where('company_id', $company->id)->exists();
        }

        $ratings = [];
        for ($i = 1; $i <= 5; $i++) {
            $count = $comments->where('rating', $i)->count();
            $percentage = $totalReviews > 0 ? ($count / $totalReviews) * 100 : 0;

            $ratings[$i] = [
                'count' => $count,
                'percentage' => round($percentage, 2),
            ];
        }

        return view('front.pages.company.show', compact([
            'company',
            'companyFeatures',
            'mainMenus',
            'features',
            'menuStructure',
            'comments',
            'averageRating',
            'totalReviews',
            'ratings',
            'isFavorite',
            'relatedCompany'
        ]));
    }
}
