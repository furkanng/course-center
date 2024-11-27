<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $types = CompanyType::all();
        return view("panel.pages.company.type", compact(["types"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "code" => "required|numeric|unique:company_type,code",
        ]);

        if ($request->has("menu_code")) {
            $model = CompanyType::query()->where("code", $request->get("menu_code"))->firstOrFail();
        } else {
            $model = new CompanyType();
        }

        $model->fill($request->all())->save();

        return redirect()->back()->with('success', 'Kayıt İşlemi Başarılı');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request): RedirectResponse
    {
        $model = CompanyType::query()->where("code", $request->get("code"))->firstOrFail();
        $model->delete();

        return redirect()->back()->with("success", "Silme işlemi başarılı");
    }
}
