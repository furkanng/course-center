<?php

namespace App\Http\Controllers\Front;

use App\Enums\SeoPrefix;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Feature;
use App\Service\Helper;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(Request $request): View
    {
        $companies = Company::query()->where("status",true)
            ->orderBy("created_at","desc")->paginate(20);

        return view("front.pages.company.index",compact(["companies"]));
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

        $comments = $company->comments;

        $averageRating = $comments->avg('rating');

        $totalReviews = $comments->count();

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
            'ratings'
        ]));
    }
}
