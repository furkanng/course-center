<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPrice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id): RedirectResponse
    {
        $request->validate([
            "price" => "required",
            "price_field_id" => "required",
            "status" => "required",
        ]);

        $model = new CompanyPrice();
        $model->fill($request->all());
        $model->forceFill(["company_id" => $id])->save();

        return back()->with("success", "İşlem Başarılı");
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
        $request->validate([
            "price" => "required",
            "price_field_id" => "required",
            "status" => "required",
        ]);

        $model = CompanyPrice::query()->findOrFail($id);
        $model->fill($request->all())->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = CompanyPrice::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
