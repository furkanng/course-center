<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): View
    {
        $company = Company::query()->findOrFail($id);
        $images = $company->images;

        return view("panel.pages.company.images", compact(["images", "company"]));
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
/*
        $model = new CompanyImage();
        $model->fill($request->all());
        $model->forceFill(["company_id" => $id, "status" => true])->save();*/


        if ($request->hasFile('image')) {

            $images = $request->file('image');

            foreach ($images as $image) {

                $model = new CompanyImage();


                $model->company_id = $id;
                $model->status = true;


                $model->image = $image;


                $model->save();
            }
        }



        return redirect()->back()->with("success", "İşlem Başarılı");
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
        $model = CompanyImage::query()->findOrFail($id);
        $model->fill($request->all())->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = CompanyImage::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
