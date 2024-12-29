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

           //$query->whereRaw('MATCH (name, city, district) AGAINST (? IN NATURAL LANGUAGE MODE)', [$search]);

            $query->whereRaw('MATCH (name, city, district) AGAINST (? IN BOOLEAN MODE)', ['*' . $search . '*']);

        }

        if ($request->filled('courses')) {
            $query->whereHas('courses', function ($q) use ($request) {
                $q->whereIn('name', $request->input('courses'));
            });
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }

        if ($request->filled('district')) {
            $query->where('district', 'like', '%' . $request->input('district') . '%');
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
