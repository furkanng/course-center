<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Course;
use App\Models\Feature;
use App\Models\UserCompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function create(): View
    {
        $companyTypes = CompanyType::all();
        return view("merchant.pages.company.create", compact(["companyTypes"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $exist = UserCompanyRequest::query()
            ->where("status", UserStatus::PENDING)
            ->where("user_id", auth()->user()->id)->get();

        if (count($exist) > 3) {
            return redirect()->back()->with("error", "Maximum talep sayısına ulaştınız.");
        }

        $company = new Company();
        $company->fill($request->all());
        $company->forceFill(["status" => false])->save();

        $request = new UserCompanyRequest();
        $request->forceFill([
            "user_id" => auth()->user()->id,
            "company_id" => $company->id,
            "status" => UserStatus::PENDING,
            "new_company" => true
        ])->save();

        return redirect()->route("merchant.companies.request.index")->with("success", "kayıt başarılı");
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
        auth()->user()->companies()->findOrFail($id);

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
        auth()->user()->companies()->findOrFail($id);

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
    public function destroy(string $id)
    {
        //
    }

    public function imageDelete(string $id): RedirectResponse
    {
        auth()->user()->companies()->findOrFail($id);

        $company = Company::query()->findOrFail($id);

        Storage::disk(config("filesystems.default"))->delete("companies/" . $company->image);

        $company->image = null;
        $company->image_url = null;
        $company->save();

        return redirect()->back()->with("success", "Resim Silme Başarılı");
    }
}
