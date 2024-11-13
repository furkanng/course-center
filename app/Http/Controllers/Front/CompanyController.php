<?php

namespace App\Http\Controllers\Front;

use App\Enums\SeoPrefix;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Service\Helper;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function show($seoLink): View
    {
        $link = Helper::parseUrl(SeoPrefix::COMPANY->value, $seoLink);

        $company = Company::query()->where('link', $link)->firstOrFail();

        return view('front.pages.company.show', compact(['company']));
    }
}
