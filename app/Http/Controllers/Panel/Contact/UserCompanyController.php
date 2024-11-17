<?php

namespace App\Http\Controllers\Panel\Contact;

use App\Http\Controllers\Controller;
use App\Models\UserCompanyContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = UserCompanyContact::query()
            ->orderBy('review', 'ASC')
            ->get();

        return view('panel.pages.contact.user.index', compact(["users"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $model = UserCompanyContact::query()->findOrFail($id);
        $model->update([
           "review" => !$request->get("review")
        ]);

        return redirect()->back()->with("success", "Güncelleme işlemi başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $model = UserCompanyContact::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "Silme işlemi başarılı");
    }
}
