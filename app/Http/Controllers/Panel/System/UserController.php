<?php

namespace App\Http\Controllers\Panel\System;

use App\Http\Controllers\Controller;
use App\Models\CompanyType;
use App\Models\InstitutionalRegister;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::query()->where('role', 'guest')->orderBy("created_at", "desc")->get();
        return view("panel.pages.system.users.userList", compact("users"));
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
        //
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
        $types = CompanyType::all();

        $user = User::query()->findOrFail($id);


        if ($user->role == "company") {

            $institution = User::query()
                ->join('company_type', 'users.company_type', '=', 'company_type.code')
                ->where('users.id', $id)
                ->orderBy('users.created_at', 'desc')
                ->firstOrFail([
                    'users.*',
                    'company_type.name as company_type_name',

                ]);
            return view("panel.pages.system.institutions.institutionEdit", compact(["institution", "types"]));
        } else if ($user->role == "guest") {

            return view("panel.pages.system.users.userEdit", compact("user"));
        }


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);

        if ($user->role == "company") {
            $institution = InstitutionalRegister::query()->where('user_id', $id)
                ->firstOrFail();
            $institution->fill(array_merge($request->all(), [
                "status" => $request->has("status"),
            ]))->save();

        }
        $user->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();
        return redirect()->back()->with('success', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function institutionList()
    {

        $institutions = User::query()
            ->join('institutional_register', 'users.id', '=', 'institutional_register.user_id')
            ->join('company_type', 'users.company_type', '=', 'company_type.code')
            ->where('users.role', 'company')
            ->orderBy('users.created_at', 'desc')
            ->get([
                'users.*',
                'institutional_register.*',
                'company_type.name as company_type_name',
                'users.status as user_status'
            ]);


        return view("panel.pages.system.institutions.institutionList", compact("institutions"));
    }

}
