<?php

namespace App\Http\Controllers\Panel\System;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $users = User::query()->where('role', UserRole::GUEST)
            ->orderBy("created_at", "desc")->get();
        return view("panel.pages.system.users.index", compact("users"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        return view("panel.pages.system.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = new User();
        $user->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
            "kvkk_approve" => $request->has("kvkk_approve"),
            "role" => UserRole::GUEST,
        ]))->save();

        return redirect()->route("panel.system.users.index")->with('success', 'Oluşturma İşlemi Başarılı');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
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
        $user->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();

        return redirect()->route("panel.system.users.index")->with('success', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = User::query()->findOrFail($id);
        $model->delete();

        return redirect()->route("panel.system.users.index")->with('success', 'Silme İşlemi Başarılı');
    }

}
