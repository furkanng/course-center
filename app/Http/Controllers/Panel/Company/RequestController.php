<?php

namespace App\Http\Controllers\Panel\Company;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\UserCompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $requests = UserCompanyRequest::query()->orderBy("created_at", "desc")->get();
        return view("panel.pages.company.request", compact(["requests"]));
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
        $request = UserCompanyRequest::query()->findOrFail($id);
        return view("panel.pages.company.requestEdit", compact(["request"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $model = UserCompanyRequest::query()->findOrFail($id);
        $model->update([
            "status" => $request->get("status")
        ]);

        //TODO SMS VEYA EMAİL EVENT
        return redirect()->back()->with("success", "Güncelleme Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
