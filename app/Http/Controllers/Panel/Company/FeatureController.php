<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $features = Feature::all();

        $mainMenus = $features->where('group_id', 0);

        $subMenus = $features->where('group_id', '!=', 0);

        $menuStructure = $mainMenus->map(function ($mainMenu) use ($subMenus) {
            $mainMenu->subMenus = $subMenus->where('group_id', $mainMenu->id);
            return $mainMenu;
        });

        return view("panel.pages.company.feature", compact(['menuStructure', 'mainMenus', 'features']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required|string",
            "status" => "required",
            "group_id" => "required"
        ]);

        if ($request->has("menu_id")) {
            $model = Feature::query()->findOrFail($request->get("menu_id"));
        } else {
            $model = new Feature();
        }

        $model->fill($request->all())->save();

        return redirect()->back()->with('success', 'Kayıt İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request): RedirectResponse
    {
        $model = Feature::query()->findOrFail($request->get("id"));
        $model->delete();
        return redirect()->back()->with('success', 'Silme İşlemi Başarılı');
    }
}
