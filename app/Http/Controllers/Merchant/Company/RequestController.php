<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\UserCompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = Company::query()->where('status', true);

        $companies->doesntHave('users');

        $companies = $companies->orderBy('created_at', 'desc')->get();

        $companyTypes = CompanyType::all();

        return view('merchant.pages.company.request', compact(['companies', 'companyTypes']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "company_id" => "required|exists:companies,id",
        ]);

        $model = new UserCompanyRequest();
        $model->forceFill([
            "user_id" => auth()->user()->id,
            "company_id" => $request->get("company_id"),
            "status" => UserStatus::PENDING,
            "new_company" => false
        ])->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
