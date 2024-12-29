<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CompanyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): View
    {
        auth()->user()->companies()->findOrFail($id);

        $company = Company::query()->findOrFail($id);
        $images = $company->images;

        return view("merchant.pages.company.images", compact(["images", "company"]));
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
        auth()->user()->companies()->findOrFail($id);

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
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        auth()->user()->companies()->findOrFail($id);

        $model = CompanyImage::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");

    }
}
