<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\CompanyType;
use App\Models\Page;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view("front.pages.home");
    }

    public function login()
    {
        return view("front.pages.login");
    }

    public function register(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $page = Page::query()->where("permanent_name", "sartlar_ve_kosullar")->first();
        $types = CompanyType::all();
        return view("front.pages.register", compact(["types", "page"]));
    }

    public function loginPost(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('panel.home');
        } else {
            return redirect()->back()->with('error', 'Giriş başarısız.');
        }
    }

    public function registerPost(RegisterRequest $request): RedirectResponse
    {
        $model = User::query()->create($request->all());

        if ($model) {
            $credentials = $request->only('email', 'password');
            Auth::attempt($credentials);
            return redirect()->route('panel.home')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
        } else {
            return redirect()->back()->with('error', 'Kullanıcı oluşturulurken bir hata oluştu.')->withInput();
        }
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Çıkış Başarılı.');
    }

    public function page($seo_link)
    {
        $page = Page::query()->where("seo_link", $seo_link)->firstOrFail();

        return view("front.pages.page", compact("page"));
    }
}
