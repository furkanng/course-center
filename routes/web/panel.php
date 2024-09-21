<?php

use App\Http\Controllers\Panel\Config\FrontImagesController;
use App\Http\Controllers\Panel\Config\LanguageController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\Setting\ContactController;
use App\Http\Controllers\Panel\Setting\SmsController;
use App\Http\Controllers\Panel\Setting\SocialMediaController;
use App\Http\Controllers\Panel\System\CourseController;
use App\Http\Controllers\Panel\System\InstitutionController;
use App\Http\Controllers\Panel\System\UserController;
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

    Route::resource("users", UserController::class)
        ->parameters(['users' => 'id'])->names([
            'index' => 'panel.system.users.index',
            'create' => 'panel.system.users.create',
            'store' => 'panel.system.users.store',
            'update' => 'panel.system.users.update',
            'edit' => 'panel.system.users.edit',
            'destroy' => 'panel.system.users.destroy'

        ]);

    Route::resource("institutions", InstitutionController::class)
        ->parameters(['institutions' => 'id'])->names([
            'index' => 'panel.system.institutions.index',
            'create' => 'panel.system.institutions.create',
            'store' => 'panel.system.institutions.store',
            'update' => 'panel.system.institutions.update',
            'edit' => 'panel.system.institutions.edit',
            'destroy' => 'panel.system.institutions.destroy'

        ]);
});

Route::prefix("settings")->group(function () {

    Route::resource("sms", SmsController::class)
        ->parameters(['sms' => 'id'])->names([
            'index' => 'panel.setting.sms.index',
            'store' => 'panel.setting.sms.store',
        ]);

    Route::resource("social-media", SocialMediaController::class)
        ->parameters(['social-media' => 'id'])->names([
            'index' => 'panel.setting.social-media.index',
            'store' => 'panel.setting.social-media.store',
        ]);

    Route::resource("contact", ContactController::class)
        ->parameters(['contact' => 'id'])->names([
            'index' => 'panel.setting.contact.index',
            'store' => 'panel.setting.contact.store',
        ]);

});
