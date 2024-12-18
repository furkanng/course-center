<?php

namespace App\Http\Controllers\Merchant\Contact;

use App\Http\Controllers\Controller;
use App\Models\CompanyUser;
use App\Models\UserCompanyContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        $companyIds = $user->companies->pluck('id');

        $users = UserCompanyContact::query()
            ->whereIn("company_id", $companyIds)
            ->where("assign",true)
            ->orderBy('review', 'ASC')
            ->paginate(20);

        return view('merchant.pages.contact.user.index', compact("users"));
    }


    public function show($id): View
    {
        $user = UserCompanyContact::query()->findOrFail($id);
        return view('merchant.pages.contact.user.show', compact(["user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $model = UserCompanyContact::query()->findOrFail($id);

        if ($request->has("review")){
            $model->update([
                "review" => !$request->get("review"),
            ]);
        }

        return redirect()->back()->with("success", "Güncelleme işlemi başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $model = UserCompanyContact::query()->findOrFail($id);
        $model->delete();

        return redirect()->back()->with("success", "Silme işlemi başarılı");
        */
    }
}
