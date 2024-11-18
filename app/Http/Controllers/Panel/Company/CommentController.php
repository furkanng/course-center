<?php

namespace App\Http\Controllers\Panel\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyComments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
