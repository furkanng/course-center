<?php

namespace App\Http\Controllers\Merchant\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();
        return view("merchant.pages.account.profile.index", compact(['user']));
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            "confirm" => "required",
        ]);

        $user = Auth::user();
        $user->delete();

        return redirect()->route("home")->with("success", "Silme İşlemi Başarılı");
    }


    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            "current_password" => "required",
            "password" => "required|min:8|confirmed",
        ]);

        $user = Auth::user();

        if (!Hash::check($request->get('current_password'), $user->password)) {
            return redirect()->back()->with(["error" => "Mevcut şifreniz yanlış."]);
        }

        $user->update([
            "password" => Hash::make($request->get("password"))
        ]);

        return redirect()->back()->with("success", "Şifre Güncellendi");
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required|sometimes",
            "city" => "required|sometimes",
            "kvkk_approve" => "required|sometimes",
            "district" => "required|sometimes",
            "phone" => "required|sometimes",
            "email" => [
                "required",
                "sometimes",
                "email",
                Rule::unique('users')->ignore($request->user()->id),
            ]]);

        $user = User::query()->findOrFail(Auth::id());

        $user->fill($request->all())->save();

        return redirect()->back()->with("success", "Güncelleme İşlemi Başarılı");
    }

}
