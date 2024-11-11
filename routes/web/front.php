<?php

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

Route::middleware(["AuthMiddleware", "auth","FrontAuth"])->group(function () {

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


