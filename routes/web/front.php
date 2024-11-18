<?php

use App\Enums\SeoPrefix;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("home");
Route::get("/giris-yap", [HomeController::class, "login"])->name("login")->middleware("LoginCacheMiddleware");
Route::post("/giris-yap", [AuthController::class, "loginPost"])->name("loginPost");

Route::post("/kayit-ol", [AuthController::class, "registerPost"])->name("registerPost");
Route::get("/kayit-ol", [HomeController::class, "register"])->name("register");
Route::get("/cikis-yap", [AuthController::class, "logout"])->name("logout");

Route::get("/sayfalar/{seo_link}", [HomeController::class, "page"])->name("front.page");

Route::middleware(["AuthMiddleware", "auth", "FrontAuth"])->group(function () {

    Route::post("comment/create/{userId}/{companyId}",[HomeController::class,"createComment"])->name("front.comment.create");

    Route::resource("profil", UserController::class)
        ->parameters(['profil' => 'id'])->names([
            'index' => 'front.profil.index',
            'create' => 'front.profil.create',
            'store' => 'front.profil.store',
            'show' => 'front.profil.show',
            'update' => 'front.profil.update',
            'edit' => 'front.profil.edit',
            'destroy' => 'front.profil.destroy',
        ]);
    Route::put("profil/{id}/update-password", [UserController::class, "updatePassword"])->name("front.profil.updatePassword");
    Route::put("profil/{id}/update-permission", [UserController::class, "updatePermission"])->name("front.profil.updatePermission");
});

Route::prefix(SeoPrefix::COMPANY->value)->group(function () {
    Route::get("{seo_link}", [CompanyController::class, "show"])->name("front.company.show");
});

Route::post("teklif-al/{id}",[HomeController::class,"createContact"])->name("front.contact.create");
