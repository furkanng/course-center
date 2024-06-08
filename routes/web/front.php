<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("home");
Route::get("/giris-yap", [HomeController::class, "login"])->name("login");
Route::post("/giris-yap", [HomeController::class, "loginPost"])->name("loginPost");
Route::get("/kayit-ol", [HomeController::class, "register"])->name("register");
Route::get("/cikis-yap", [HomeController::class, "logout"])->name("logout");


