<?php

namespace App\Http\Controllers\Front;

use App\Enums\SeoPrefix;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Page;
use App\Service\Helper;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function home(): View
    {
        $previewCompanies = Company::query()
            ->where("status", true)
            ->orderBy("created_at", "desc")
            ->take(6)
            ->get();

        return view("front.pages.home", compact(["previewCompanies"]));
    }

    public function login(): View
    {
        return view("front.pages.login");
    }

    public function register(): View
    {
        $types = CompanyType::all();
        return view("front.pages.register", compact(["types"]));
    }


    public function page($seoLink): View
    {
        $link = Helper::parseUrl(SeoPrefix::PAGE->value, $seoLink);

        $page = Page::query()->where("link", $link)->firstOrFail();

        return view("front.pages.page", compact(["page"]));
    }
}
