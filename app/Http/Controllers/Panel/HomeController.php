<?php

namespace App\Http\Controllers\Panel;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\UserCompanyRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): view
    {
        $guestUserCount = User::where('role', UserRole::GUEST)
        ->where('status', 1)
        ->count();

        $companyUserCount = User::where('role', UserRole::COMPANY)
            ->where('status', 1)
            ->count();

        $companiesCount = Company::where('status', 1)->count();

        $userCompanyRequestCount = UserCompanyRequest::count();

        $lastCompanies = Company::orderBy('created_at', 'desc')->take(4)->get();


        return view("panel.pages.home",compact('guestUserCount','companyUserCount','userCompanyRequestCount','companiesCount','lastCompanies'));
    }
}
