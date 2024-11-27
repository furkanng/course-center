<?php

namespace App\Http\Controllers\Front;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\InfoMail;
use App\Mail\ResetMail;
use App\Models\InstitutionalRegister;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthController extends Controller
{


    public function forgotPasswordGet(): View
    {
        return view('front.pages.forgotPassword');
    }

    public function forgotPassword(Request $request): RedirectResponse
    {
        $user = User::query()->where("email", $request->email)->first();

        if ($user) {

            $renewCode = Hash::make(now()->format("Y-m-d H:i:s"));

            $renewLink = config("app.url") . '/sifre-yenileme?reset_token=' . $renewCode;

            $data = [
                "site_url" => config("app.url"),
                "mail_title" => "Şifre Yenileme Bağlantısı",
                "mail_content" => "Şifre yenileme isteğiniz alındı. Aşağıdaki Butona tıklayarak şifrenizi yenileyebilirsiniz.",
                "renew_link" => $renewLink,
            ];

            $address = $request->email;
            $subject = "Şifre Yenileme Bağlantısı";


            Mail::to($address)->send(new ResetMail($data, $address, $subject));

            $datetime = Carbon::now()->format("Y-m-d H:i:s");
            PasswordReset::where("email", $request->email)->delete();

            $passwordReset = new PasswordReset();

            $passwordReset->insert([
                "email" => $request->email,
                "token" => $renewCode,
                "created_at" => $datetime
            ]);

            return redirect()->route('login')->with('success', 'Mail Gönderildi. Lütfen bekleyiniz.');


        } else {
            return redirect()->route('home')->with('error', 'Kullanıcı Bulunamadı.');
        }
    }

    public function resetPasswordGet(Request $request): View
    {
        $reset_token = $request->query('reset_token');
        return view('front.pages.resetPassword', compact("reset_token"));
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        if (($request->has("reset_token"))) {

            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $renewCode = PasswordReset::where("token", $request->reset_token)->first();

            $user = User::where("email", $renewCode->email)->first();

            $user->password = Hash::make($request->password);
            $result = $user->save();

            PasswordReset::where("email", $user->email)->delete();

            if ($result) {
                return redirect()->route('login')->with('success', 'Şifre Başarıyla Değiştirilmiştir.');
            } else {
                return redirect()->back()->with('error', 'Hatalı İşlem.');
            }
        } else {
            return redirect()->route('home')->with('error', 'Hatalı Url.');
        }
    }


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

                $data = [
                    "site_url" => config("app.url"),
                    "mail_title" => "Hoşgeldiniz",
                    "mail_content" => $user->name . ' ' . 'Kayıt başvurunuz alınmıştır. En kısa sürede dönüş sağlıyacağız',
                ];

                $address = $user->email;
                $subject = "Kayıt Başvurusu";


                Mail::to($address)->send(new InfoMail($data, $address, $subject));

                return redirect()->back()->with("registerSuccess", true);

            case UserRole::GUEST->value:

                $user->fill(array_merge($request->all(),
                    [
                        "user_type" => $request->user_type_guest,
                        "status" => true,
                        'kvkk_approve' => $request->has('kvkk_approve')
                    ]
                ))->save();


                $data = [
                    "site_url" => config("app.url"),
                    "mail_title" => "Hoşgeldiniz",
                    "mail_content" => $user->name . ' ' . 'Kaydınız alınmıştır. Aradığınız eğitim kurumunu en kısa sürede bulucağınızdan eminiz',
                ];

                $address = $user->email;
                $subject = "Hoşgeldiniz Mesajı";


                Mail::to($address)->send(new InfoMail($data, $address, $subject));

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
