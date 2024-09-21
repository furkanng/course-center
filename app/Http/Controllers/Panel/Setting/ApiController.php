<?php

namespace App\Http\Controllers\Panel\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        return view('panel.pages.setting.api.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $model = new Setting();

        foreach ($request->all() as $key => $value) {
            $model::set($key, [$value]);
        }

        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }
}
