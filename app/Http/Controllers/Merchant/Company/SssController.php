<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanySss;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

class SssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
            "question" => "required",
            "answer" => "required",
            "status" => "required",
        ]);

        $model = new CompanySss();
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
            "question" => "required",
            "answer" => "required",
            "status" => "required",
        ]);

        $model = CompanySss::query()->findOrFail($id);
        $model->fill($request->all())->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = CompanySss::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
