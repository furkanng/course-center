<?php

namespace App\Http\Controllers\Panel\Config;

use App\Http\Controllers\Controller;
use App\Models\MostSearch;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Laravel\Prompts\table;

class MostSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = MostSearch::query()->orderBy("order")->get();
        return view("panel.pages.config.mostSearch.index", compact(["companies"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("panel.pages.config.mostSearch.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "company_id" => "required|exists:companies,id",
        ]);

        $model = new MostSearch();
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
            "added_by" => 'admin',
        ]))->save();

        return redirect()->route("panel.config.most-search.index")->with("success", "İşlem Başarılı");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $company = MostSearch::query()->findOrFail($id);
        return view("panel.pages.config.mostSearch.edit", compact(["company"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "company_id" => "required|exists:companies,id",
        ]);

        $model = MostSearch::query()->findOrFail($id);
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
            "added_by" => 'admin',
        ]))->save();

        return redirect()->route("panel.config.most-search.index")->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = MostSearch::query()->findOrFail($id);
        $model->delete();

        return redirect()->route("panel.config.most-search.index")->with("success", "İşlem Başarılı");
    }
}
