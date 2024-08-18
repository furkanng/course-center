<?php

use App\Http\Controllers\Panel\Config\FrontImagesController;
use App\Http\Controllers\Panel\Config\LanguageController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\System\CourseController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("panel.home");

Route::prefix("site-config")->group(function () {
    Route::resource('languages', LanguageController::class)
        ->parameters(['languages' => 'id'])->names([
            'index' => 'panel.config.language.index',
            'update' => 'panel.config.language.update',
        ]);

    Route::resource('images', FrontImagesController::class)
        ->parameters(['images' => 'id'])->names([
            'index' => 'panel.config.image.index',
            'update' => 'panel.config.image.update',
            'destroy' => 'panel.config.image.destroy',
        ]);
});

Route::prefix("system")->group(function () {

    Route::resource("course", CourseController::class)
        ->parameters(['course' => 'id'])->names([
            'index' => 'panel.system.course.index',
            'create' => 'panel.system.course.create',
            'store' => 'panel.system.course.store',
            'update' => 'panel.system.course.update',
            'edit' => 'panel.system.course.edit',
            'destroy' => 'panel.system.course.destroy',
        ]);
});

