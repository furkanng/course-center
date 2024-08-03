<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("home");
Route::get("/giris-yap", [HomeController::class, "login"])->name("login")->middleware("LoginCacheMiddleware");
Route::post("/giris-yap", [HomeController::class, "loginPost"])->name("loginPost");
Route::post("/kayit-ol", [HomeController::class, "registerPost"])->name("registerPost");
Route::get("/kayit-ol", [HomeController::class, "register"])->name("register");
Route::get("/cikis-yap", [HomeController::class, "logout"])->name("logout");

Route::get("/sayfa/{seo_link}", [HomeController::class, "page"])->name("front.page");

