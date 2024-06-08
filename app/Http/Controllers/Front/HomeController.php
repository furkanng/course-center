<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Setting::query()->where("group_key", "slider_settings")->get();
        $categories = Setting::query()->where("group_key", "category_settings")->get();
        $researches = Setting::query()->where("group_key", "research_settings")->get();
        $courses = Course::query()->where("status", 1)->orderBy('order')->get();

        $data = [];

        foreach ($sliders as $slider) {
            $data["slider"][$slider->key] = $slider->value;
        }
        foreach ($categories as $category) {
            $data["category"][$category->key] = $category->value;
        }
        foreach ($researches as $research) {
            $data["research"][$research->key] = $research->value;
        }
        return view("front.pages.home", compact(["data", "courses"]));
    }

    public function login()
    {
        $courses = Course::query()->where("status", 1)->orderBy('order')->get();
        return view("front.pages.login",compact("courses"));
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('panel.home');
        } else {
            return redirect()->back()->with('error', 'Giriş başarısız.');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('error', 'Çıkış Başarılı.');
    }
}
