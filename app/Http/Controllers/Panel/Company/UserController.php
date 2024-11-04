<?php

namespace App\Http\Controllers\Panel\Company;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): View
    {
        $company = Company::query()->findOrFail($id);
        $user = $company->users->first();

        $institutions = User::query()->where('role', UserRole::COMPANY)
            ->orderBy("created_at", "desc")->where("status", true)->get();

        return view("panel.pages.company.users", compact(["user", "company", "institutions"]));
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
    public function store(Request $request)
    {

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
    public function update(Request $request, $companyId, $userId)
    {
        $model = CompanyUser::query()->where("company_id", $companyId)->first();

        if ($model) {

            $existingUser = CompanyUser::query()->where("user_id", $userId)->count();

            if ($existingUser >= \App\Enums\Company::MAX_USER_COMPANY_COUNT->value) {
                return redirect()->back()->with("error", "Bir kullanıcıya en fazla 3 kurum atanabilir.");
            }

            $model->forceFill([
                "user_id" => $userId
            ])->save();

        } else {

            $existingUser = CompanyUser::query()->where("user_id", $userId)->count();

            if ($existingUser >= 3) {
                return redirect()->back()->with("error", "Bir kullanıcıya en fazla 3 kurum atanabilir.");
            }

            CompanyUser::query()->forceCreate([
                "company_id" => $companyId,
                "user_id" => $userId
            ]);
        }

        return redirect()->back()->with("success", "Atama işlemi başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($companyId, $userId)
    {
        $model = CompanyUser::query()->where("company_id", $companyId)->where("user_id", $userId)->firstOrFail();
        $model->forceDelete();

        return redirect()->back()->with("success", "Kaldırma işlemi başarılı");
    }
}
