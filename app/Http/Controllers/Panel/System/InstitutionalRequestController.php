<?php

namespace App\Http\Controllers\Panel\System;

use App\Http\Controllers\Controller;
use App\Models\CompanyType;
use App\Models\InstitutionalRegister;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InstitutionalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = InstitutionalRegister::query()->orderBy("created_at", "desc")->get();
        return view("panel.pages.system.institutionalRequest.index", compact("users"));
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id): view
    {
        $companyTypes = CompanyType::all();
        $user = InstitutionalRegister::query()->findOrFail($id);
        return view("panel.pages.system.institutionalRequest.edit", compact(["user", "companyTypes"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $status = $request->get("status");
        $user = InstitutionalRegister::query()->findOrFail($id);
        $user->update(["status" => $status]);
        //TODO: kullanıcıya sms veya mail ile bildirim gönderilecek
        return redirect()->route("panel.system.institutional-register.index")
            ->with('success', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = InstitutionalRegister::query()->findOrFail($id);
        $model->delete();

        return redirect()->route("panel.system.users.index")->with('success', 'Silme İşlemi Başarılı');
    }
}
