<?php

namespace App\Http\Controllers\Panel\System;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\CompanyType;
use App\Models\InstitutionalRegister;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $users = User::query()->where('role', UserRole::GUEST)
            ->orderBy("created_at", "desc")->get();
        return view("panel.pages.system.users.index", compact("users"));
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|Application
    {
        $user = User::query()->findOrFail($id);
        return view("panel.pages.system.users.edit", compact("user"));
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

}
