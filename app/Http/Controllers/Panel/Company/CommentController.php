<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Imports\CompanyImport;
use App\Jobs\ImportCompanyJob;
use App\Models\Company;
use App\Models\CompanyComments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id): View
    {
        $company = Company::query()->findOrFail($id);
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
}
