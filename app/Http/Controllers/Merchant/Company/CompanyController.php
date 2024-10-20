<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Course;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = auth()->user()->companies;

        return view("merchant.pages.company.index", compact(["companies"]));
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
    public function store(Request $request)
    {
        //
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
    public function edit(string $id): View
    {
        $features = Feature::query()->where("status", true)->get();
        $courses = Course::query()->where("status", true)->get();
        $companyTypes = CompanyType::all();
        $company = Company::query()->findOrFail($id);

        $sss = $company->sss;
        $prices = $company->price;

        $companyFeatures = $company->features()->pluck('feature_id')->toArray();

        $mainMenus = $features->where('group_id', 0);

        $subMenus = $features->where('group_id', '!=', 0);

        $menuStructure = $mainMenus->map(function ($mainMenu) use ($subMenus) {
            $mainMenu->subMenus = $subMenus->where('group_id', $mainMenu->id);
            return $mainMenu;
        });

        return view("merchant.pages.company.edit", compact([
                "company",
                "companyTypes",
                "courses",
                'features',
                'mainMenus',
                'subMenus',
                'menuStructure',
                'companyFeatures',
                'sss',
                'prices'
            ]
        ));
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
    public function destroy(string $id)
    {
        //
    }

    public function imageDelete(string $id): RedirectResponse
    {
        $company = Company::query()->findOrFail($id);

        Storage::disk(config("filesystems.default"))->delete("companies/" . $company->image);

        $company->image = null;
        $company->image_url = null;
        $company->save();

        return redirect()->back()->with("success", "Resim Silme Başarılı");
    }
}
