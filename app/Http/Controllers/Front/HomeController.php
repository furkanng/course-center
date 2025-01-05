<?php

namespace App\Http\Controllers\Front;

use App\Enums\SeoPrefix;
use App\Http\Controllers\Controller;
use App\Models\Bulletin;
use App\Models\CompanyComments;
use App\Models\CompanyType;
use App\Models\MostSearch;
use App\Models\Page;
use App\Models\UserCompanyContact;
use App\Service\Helper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): View
    {
        $mostSearch = MostSearch::query()
            ->where("status", true)
            ->where(function ($query) {
                $query->whereNull("remaining_date")
                    ->orWhere("remaining_date", ">", now());
            })
            ->orderBy("order")
            ->with('company')
            ->get();

        $previewCompanies = $mostSearch->pluck('company');

        return view("front.pages.home", compact(["previewCompanies"]));
    }


    public function login(): View
    {
        return view("front.pages.login");
    }

    public function register(): View
    {
        $types = CompanyType::all();
        return view("front.pages.register", compact(["types"]));
    }


    public function page($seoLink): View
    {
        $link = Helper::parseUrl(SeoPrefix::PAGE->value, $seoLink);

        $page = Page::query()->where("link", $link)->firstOrFail();

        return view("front.pages.page", compact(["page"]));
    }

    public function createContact(Request $request, $id): RedirectResponse
    {
        $request->validate([
            "company_id" => "required",
            "customer_name" => "required",
            "customer_email" => "required",
            "customer_phone" => "required",
            "customer_content" => "required",
        ]);

        $model = new UserCompanyContact();
        $model->forceFill([
            "company_id" => $id,
            "customer_name" => $request->get("name"),
            "customer_email" => $request->get("email"),
            "customer_phone" => $request->get("phone"),
            "customer_content" => $request->get("content"),
            "review" => false,
        ])->save();

        return redirect()->back()->with("success", "İşlem Başarılı");
    }

    public function createComment(Request $request, $userId, $companyId): RedirectResponse
    {
        $request->validate([
            "comment" => "required",
            "rating" => "required",
        ]);

        $model = new CompanyComments();
        $model->forceFill([
            "company_id" => $companyId,
            "user_id" => $userId,
            "comment" => $request->get("comment"),
            "rating" => $request->get("rating"),
            "status" => true,
        ])->save();

        return redirect()->back()->with("success", "Yorum Gönderildi");
    }

    public function createBulletin(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => "required",
        ]);

        Bulletin::query()->create([
            "email" => $request->get("email"),
        ]);

        return redirect()->back()->with("success", "Abone Olundu");
    }

    public function toggleFavorite(Request $request): JsonResponse
    {
        $user = auth()->user();
        $companyId = $request->input('companyId');

        if (!$user || !$companyId) {
            return response()->json(['success' => false, 'message' => 'Geçersiz istek'], 400);
        }

        $isFavorited = $user->favorite()->where('company_id', $companyId)->exists();

        if ($isFavorited) {
            $user->favorite()->detach($companyId);
            return response()->json(['success' => true, 'favorited' => false, 'message' => 'Favoriden çıkarıldı']);
        } else {
            $user->favorite()->attach($companyId);
            return response()->json(['success' => true, 'favorited' => true, 'message' => 'Favorilere eklendi']);
        }
    }

}
