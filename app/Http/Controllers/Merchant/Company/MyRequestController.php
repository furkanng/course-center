<?php

namespace App\Http\Controllers\Merchant\Company;

use App\Http\Controllers\Controller;
use App\Models\UserCompanyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $requests = UserCompanyRequest::query()->where("user_id", auth()->user()->id)->get();
        return view('merchant.pages.company.myRequest', compact(["requests"]));
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
        $request = UserCompanyRequest::query()->where("company_id", $id)->where("user_id", Auth::user()->id)->firstOrFail();
        return view('merchant.pages.company.myRequestEdit', compact(["request"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            "id_card_front" => "mimes:jpeg,png,jpg",
            "id_card_back" => "mimes:jpeg,png,jpg",
            "proxy" => "mimes:jpeg,png,jpg",
            "permit" => "mimes:jpeg,png,jpg",
        ]);

        $model = UserCompanyRequest::query()->where("company_id", $id)
            ->where("user_id", Auth::user()->id)->firstOrFail();

        if ($request->hasFile("id_card_front")) {
            $url = Storage::disk(config("filesystems.default"))
                ->putFileAs($model->getTable(), $request->file("id_card_front"),
                    rand(1, 99) . $request->file("id_card_front")->getClientOriginalName());
            $model->id_card_front = self::urlRefactor($url);
        }
        if ($request->hasFile("id_card_back")) {
            $url = Storage::disk(config("filesystems.default"))
                ->putFileAs($model->getTable(), $request->file("id_card_back"),
                    rand(1, 99) . $request->file("id_card_back")->getClientOriginalName());
            $model->id_card_back = self::urlRefactor($url);
        }
        if ($request->hasFile("permit")) {
            $url = Storage::disk(config("filesystems.default"))
                ->putFileAs($model->getTable(), $request->file("permit"),
                    rand(1, 99) . $request->file("permit")->getClientOriginalName());
            $model->permit = self::urlRefactor($url);
        }
        if ($request->hasFile("proxy")) {
            $url = Storage::disk(config("filesystems.default"))
                ->putFileAs($model->getTable(), $request->file("proxy"),
                    rand(1, 99) . $request->file("proxy")->getClientOriginalName());
            $model->proxy = self::urlRefactor($url);
        }

        $model->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private static function urlRefactor($url): string
    {
        if (config("filesystems.default") === "public") {
            return config("app.url") . "/storage/" . $url;
        } else {
            return $url;
        }
    }
}
