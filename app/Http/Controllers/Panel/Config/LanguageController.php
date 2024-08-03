<?php

namespace App\Http\Controllers\Panel\Config;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $languages = Language::all();
        return view('panel.pages.config.language.index',compact("languages"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $language = Language::query()->findOrFail($id);
        $language->update(["value" => $request->get("value")]);

        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }

}
