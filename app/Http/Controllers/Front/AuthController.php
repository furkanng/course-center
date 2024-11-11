<?php

namespace App\Http\Controllers\Front;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\InstitutionalRegister;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->back()->with("error", "E-posta veya şifre hatalı.");
        }

        $user = Auth::user();

        if (!$user->status) {
            Auth::logout();
            return redirect()->back()->with("error", "Giriş Başarısız. Kullanıcı aktif değil.");
        }

        switch ($user->role):
            case UserRole::ADMIN:
                return redirect()->route('panel.home');
            case UserRole::COMPANY:
                return redirect()->route('merchant.home');
            case UserRole::GUEST:
                return redirect()->route('home');
        endswitch;
    }

    public function registerPost(RegisterRequest $request): RedirectResponse
    {
        $user = new User();

        $role = $request->get("role");

        switch ($role) {
            case UserRole::COMPANY->value:
                $user->fill(array_merge($request->all(),
                    [
                        "user_type" => $request->user_type_company,
                        "status" => false,
                        'kvkk_approve' => $request->has('kvkk_approve')
                    ]
                ))->save();

                InstitutionalRegister::query()->create([
                    "user_id" => $user->id,
                    "status" => UserStatus::PENDING,
                    "company_name" => $user->company_name,
                    "company_type" => $user->company_type
                ]);

                return redirect()->back()->with("companyRegister", "Kayıt Başarılı");

            case UserRole::GUEST->value:

                $user->fill(array_merge($request->all(),
                    [
                        "user_type" => $request->user_type_guest,
                        "status" => true,
                        'kvkk_approve' => $request->has('kvkk_approve')
                    ]
                ))->save();

                return redirect()->route('home')->with("success", "Kayıt Başarılı");
        }

        return redirect()->back()->with("error", "Kayıt Başarısız")->withInput();
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Çıkış Başarılı.');
    }

}
