<?php

namespace App\Http\Controllers\Panel\Config;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plans = Plan::all();
        return view("panel.pages.config.plan.index", compact(["plans"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("panel.pages.config.plan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "type" => "required",
            "period" => "required",
        ]);

        $model = new Plan();
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();

        return redirect()->route("panel.config.plans.index")->with("success", "İşlem Başarılı");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $plan = Plan::query()->findOrFail($id);
        return view("panel.pages.config.plan.edit", compact(["plan"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required",
            "description" => "required",
            "type" => "required",
            "period" => "required",
        ]);

        $model = Plan::query()->findOrFail($id);
        $model->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();

        return redirect()->route("panel.config.plans.index")->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = Plan::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
