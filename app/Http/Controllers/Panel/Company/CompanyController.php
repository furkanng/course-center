<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use App\Models\CompanySss;
use App\Models\CompanyType;
use App\Models\Course;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $companies = Company::query()->orderBy("created_at", "desc")->paginate(10);
        return view("panel.pages.company.index", compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): view
    {
        $companyTypes = CompanyType::all();
        return view("panel.pages.company.create", compact(["companyTypes"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        $company = new Company();
        $company->fill($request->all());
        $company->forceFill(["status" => true])->save();

        return redirect()->route("panel.companies.company.edit", ["id" => $company->id])
            ->with("success", "kayıt başarılı");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
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

        return view("panel.pages.company.edit", compact([
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
    public function update(Request $request, $id): RedirectResponse
    {
        $company = Company::query()->findOrFail($id);
        $company->fill($request->all())->save();

        if ($company->info) {
            $company->info->update([
                "about" => $request->get("about"),
                "map" => $request->get("map"),
                "facebook" => $request->get("facebook"),
                "instagram" => $request->get("instagram"),
                "youtube" => $request->get("youtube"),
                "twitter" => $request->get("twitter"),
            ]);
        } else {
            $company->info()->create([
                "about" => $request->get("about"),
                "map" => $request->get("map"),
                "facebook" => $request->get("facebook"),
                "instagram" => $request->get("instagram"),
                "youtube" => $request->get("youtube"),
                "twitter" => $request->get("twitter"),
            ]);
        }

        if ($request->has('courses')) {
            $company->courses()->sync($request->get('courses'));
        }

        if ($request->has('features')) {
            $company->features()->sync($request->get('features'));
        }

        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $company = Company::query()->findOrFail($id);
        $company->delete();

        return redirect()->back()->with("success", "İşlem Başarılı");
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
