<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("home");
Route::get("/giris-yap", [HomeController::class, "login"])->name("login")->middleware("LoginCacheMiddleware");
Route::post("/giris-yap", [AuthController::class, "loginPost"])->name("loginPost");

Route::post("/kayit-ol", [AuthController::class, "registerPost"])->name("registerPost");
Route::get("/kayit-ol", [HomeController::class, "register"])->name("register");
Route::get("/cikis-yap", [AuthController::class, "logout"])->name("logout");

Route::get("/sayfa/{seo_link}", [HomeController::class, "page"])->name("front.page");


