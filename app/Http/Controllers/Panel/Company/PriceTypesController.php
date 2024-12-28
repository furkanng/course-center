<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Models\PriceField;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PriceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $priceTypes = PriceField::query()->orderBy("created_at", "desc")->paginate(10);
        return view("panel.pages.company.priceTypes", compact(["priceTypes"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("panel.pages.company.priceTypesCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $priceField = new PriceField();

        $priceField->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();
        return redirect()->route("panel.companies.price_types.index")->with('success', 'Kayıt İşlemi Başarılı');
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
    public function update(Request $request, string $id): RedirectResponse
    {
        $priceField = PriceField::query()->findOrFail($id);


        $priceField->fill(array_merge($request->all(), [
            "status" => $request->has("status"),
        ]))->save();
        return redirect()->back()->with('success', 'Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = PriceField::query()->findOrFail($id);
        $model->delete();

        session()->flash('delete_success', true);
        return redirect()->route("panel.companies.price_types.index")->with('success', 'Silme İşlemi Başarılı');
    }
}
