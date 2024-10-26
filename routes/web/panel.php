<?php

use App\Http\Controllers\Panel\Company\CompanyController;
use App\Http\Controllers\Panel\Company\CompanyImageController;
use App\Http\Controllers\Panel\Company\FeatureController;
use App\Http\Controllers\Panel\Company\PriceController;
use App\Http\Controllers\Panel\Company\RequestController;
use App\Http\Controllers\Panel\Company\SssController;
use App\Http\Controllers\Panel\Company\TypeController;
use App\Http\Controllers\Panel\Config\FrontImagesController;
use App\Http\Controllers\Panel\Config\LanguageController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\Setting\ApiController;
use App\Http\Controllers\Panel\Setting\ContactController;
use App\Http\Controllers\Panel\Setting\EmailController;
use App\Http\Controllers\Panel\Setting\SmsController;
use App\Http\Controllers\Panel\Setting\SocialMediaController;
use App\Http\Controllers\Panel\System\CourseController;
use App\Http\Controllers\Panel\System\InstitutionalRequestController;
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

    Route::resource("institutional-register", InstitutionalRequestController::class)
        ->parameters(['institutional-register' => 'id'])->names([
            'index' => 'panel.system.institutional-register.index',
            'create' => 'panel.system.institutional-register.create',
            'store' => 'panel.system.institutional-register.store',
            'update' => 'panel.system.institutional-register.update',
            'edit' => 'panel.system.institutional-register.edit',
            'destroy' => 'panel.system.institutional-register.destroy'

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

    Route::resource("api", ApiController::class)
        ->parameters(['api' => 'id'])->names([
            'index' => 'panel.setting.api.index',
            'store' => 'panel.setting.api.store',
        ]);

    Route::resource("email", EmailController::class)
        ->parameters(['email' => 'id'])->names([
            'index' => 'panel.setting.email.index',
            'store' => 'panel.setting.email.store',
        ]);

});

Route::prefix("companies")->group(function () {

    Route::resource("company", CompanyController::class)
        ->parameters(['company' => 'id'])->names([
            'index' => 'panel.companies.company.index',
            'create' => 'panel.companies.company.create',
            'store' => 'panel.companies.company.store',
            'update' => 'panel.companies.company.update',
            'edit' => 'panel.companies.company.edit',
            'destroy' => 'panel.companies.company.destroy',
        ]);

    Route::resource("company.sss", SssController::class)
        ->parameters(['sss' => 'id'])->names([
            'index' => 'panel.companies.sss.index',
            'create' => 'panel.companies.sss.create',
            'store' => 'panel.companies.sss.store',
            'update' => 'panel.companies.sss.update',
            'edit' => 'panel.companies.sss.edit',
            'destroy' => 'panel.companies.sss.destroy',
        ])->shallow();

    Route::resource("company.price", PriceController::class)
        ->parameters(['price' => 'id'])->names([
            'index' => 'panel.companies.price.index',
            'create' => 'panel.companies.price.create',
            'store' => 'panel.companies.price.store',
            'update' => 'panel.companies.price.update',
            'edit' => 'panel.companies.price.edit',
            'destroy' => 'panel.companies.price.destroy',
        ])->shallow();

    Route::delete("company/image/{id}", [CompanyController::class, "imageDelete"])
        ->name("panel.companies.company.image.delete");

    Route::resource("company.image", CompanyImageController::class)
        ->parameters(['image' => 'id'])->names([
            'index' => 'panel.companies.image.index',
            'create' => 'panel.companies.image.create',
            'store' => 'panel.companies.image.store',
            'update' => 'panel.companies.image.update',
            'edit' => 'panel.companies.image.edit',
            'destroy' => 'panel.companies.image.destroy'
        ])->shallow();

    Route::resource("feature", FeatureController::class)
        ->parameters(['feature' => 'id'])->names([
            'index' => 'panel.companies.feature.index',
            'store' => 'panel.companies.feature.store',
        ]);

    Route::post("feature/delete", [FeatureController::class, "delete"])
        ->name("panel.companies.feature.delete");

    Route::resource("request", RequestController::class)
        ->parameters(['request' => 'id'])->names([
            'index' => 'panel.companies.request.index',
            'create' => 'panel.companies.request.create',
            'store' => 'panel.companies.request.store',
            'update' => 'panel.companies.request.update',
            'edit' => 'panel.companies.request.edit',
            'destroy' => 'panel.companies.request.destroy',
        ]);

    Route::resource("type", TypeController::class)
        ->parameters(['type' => 'id'])->names([
            'index' => 'panel.companies.type.index',
            'create' => 'panel.companies.type.create',
            'store' => 'panel.companies.type.store',
            'update' => 'panel.companies.type.update',
            'edit' => 'panel.companies.type.edit',
        ]);

    Route::post("type/delete", [TypeController::class, "delete"])
        ->name("panel.companies.type.delete");
});
