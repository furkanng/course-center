<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): view
    {
        $user = auth()->user();

        $totalCompaniesCount = CompanyUser::where('user_id', $user->id)->count();

        $companyIds = $user->companies()->pluck('company_id');
        $companies = Company::whereIn('id', $companyIds)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();



        return view("merchant.pages.home",compact('companies','totalCompaniesCount'));
    }
}
