<?php

use App\Http\Controllers\Panel\CourseController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\SettingController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("panel.home");

Route::prefix("frontend")->group(function () {

    Route::resource("dashboard", SettingController::class)
        ->parameters(['dashboard' => 'id'])->names([
            'index' => 'panel.frontend.dashboard.index',
            'store' => 'panel.frontend.dashboard.store',
        ]);
});

Route::prefix("manager")->group(function () {

    Route::resource("course", CourseController::class)
        ->parameters(['course' => 'id'])->names([
            'index' => 'panel.manager.course.index',
            'create' => 'panel.manager.course.create',
            'store' => 'panel.manager.course.store',
            'update' => 'panel.manager.course.update',
            'edit' => 'panel.manager.course.edit',
            'destroy' => 'panel.manager.course.destroy',
        ]);
});

