<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        return view("front.pages.user.index", compact(["user"]));
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "city" => "required",
            "district" => "required",
            "name" => "required",
            "phone" => "required",
            "email" => "required|email",
        ]);

        $user = User::query()->findOrFail($id);
        $user->fill($request->all())->save();

        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }

    public function updatePassword(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "password" => "required|min:8|confirmed",
        ]);

        $user = User::query()->findOrFail($id);
        $user->fill($request->all())->save();

        return redirect()->back()->with("success", "Şifre Başarıyla Güncellendi");
    }

    public function updatePermission(Request $request, string $id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $user->fill([
            "email_approve" => $request->has("email_approve"),
            "sms_approve" => $request->has("sms_approve"),
        ])->save();

        return redirect()->back()->with("success", "İzinler Başarıyla Güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
