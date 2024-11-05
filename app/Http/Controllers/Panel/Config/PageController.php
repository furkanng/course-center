<?php

namespace App\Http\Controllers\Panel\Config;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pages = Page::all();
        return view("panel.pages.config.page.index", compact(["pages"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("panel.pages.config.page.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "title" => "required",
            "status" => "required"
        ]);

        $page = new Page();
        $page->fill($request->all())->save();

        return redirect()->route("panel.config.pages.index")->with("success", "Kaydetme işlemi başarılı.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $page = Page::query()->findOrFail($id);
        return view("panel.pages.config.page.edit", compact(["page"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "title" => "required",
            "status" => "required"
        ]);

        $page = Page::query()->findOrFail($id);
        $page->fill($request->all())->save();

        return redirect()->route("panel.config.pages.index")->with("success", "Güncelleme işlemi başarılı.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $page = Page::query()->findOrFail($id);
        $page->delete();

        return redirect()->route("panel.config.pages.index")->with("success", "Silme işlemi başarılı.");
    }
}
