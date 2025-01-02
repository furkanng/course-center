<?php

namespace App\Http\Controllers\Panel\Company;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Imports\CompanyImport;
use App\Jobs\ImportCompanyJob;
use App\Models\Company;
use App\Models\CompanyComments;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id): View
    {
        $company = Company::query()
            ->with('comments')
            ->findOrFail($id);
        $comments = $company->comments;

        return view("panel.pages.company.comment", compact(["comments", "company"]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $comment = CompanyComments::query()->findOrFail($id);
        return view("panel.pages.company.commentEdit", compact(["comment"]));
    }

    public function create($id): View
    {
        return view("panel.pages.company.commentCreate", compact("id"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $model = CompanyComments::query()->findOrFail($id);
        $model->fill([
            "status" => $request->has("status")
        ])->save();

        return redirect()->back()->with("success", "Güncelleme işlemi başarılı");
    }

    public function store(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'rating' => 'required',
            'email' => 'required|string|email',
            'comment' => 'required|string|max:2000',
        ]);

        $user = User::query()->create([
            "name" => $validatedData["name"],
            "email" => $validatedData["email"],
            "password" => Str::random(8),
            "city" => $this->generateRandomCity(),
            "district" => $this->generateRandomDistrict(),
            "phone" => $validatedData["phone"],
            "role" => UserRole::GUEST,
            "status" => true,
            "kvkk_approve" => true,
        ]);

        CompanyComments::query()->create([
            "status" => $request->has("status"),
            "company_id" => $id,
            "rating" => $validatedData["rating"],
            "user_id" => $user->id,
            "comment" => $validatedData["comment"],
        ]);

        return redirect()->route('panel.companies.comment.index', ['company' => $id])
            ->with("success", "Kaydetme işlemi başarılı");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = CompanyComments::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "Silme işlemi başarılı");
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,xls',
        ]);

        $filePath = $request->file('file')->store('imports', 'public');

        Excel::queueImport(new CompanyImport(), $filePath, 'public');

        return redirect()->back()->with("success", "Yükleme işlemi başarılı");
    }

    private function generateRandomCity(): string
    {
        $cities = ['Istanbul', 'Ankara', 'Izmir', 'Bursa', 'Antalya'];
        return $cities[array_rand($cities)];
    }

    private function generateRandomDistrict(): string
    {
        $districts = ['Kadikoy', 'Besiktas', 'Cankaya', 'Konak', 'Muratpasa'];
        return $districts[array_rand($districts)];
    }

}
