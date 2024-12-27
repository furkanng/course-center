<?php

use App\Http\Controllers\Panel\Company\CommentController;
use App\Http\Controllers\Panel\Company\CompanyController;
use App\Http\Controllers\Panel\Company\CompanyImageController;
use App\Http\Controllers\Panel\Company\FeatureController;
use App\Http\Controllers\Panel\Company\PriceController;
use App\Http\Controllers\Panel\Company\RequestController;
use App\Http\Controllers\Panel\Company\SssController;
use App\Http\Controllers\Panel\Company\TypeController;
use App\Http\Controllers\Panel\Config\FrontImagesController;
use App\Http\Controllers\Panel\Config\LanguageController;
use App\Http\Controllers\Panel\Config\MostSearchController;
use App\Http\Controllers\Panel\Config\PageController;
use App\Http\Controllers\Panel\Config\PlanController;
use App\Http\Controllers\Panel\Contact\BulletinController;
use App\Http\Controllers\Panel\Contact\UserCompanyController;
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
use App\Http\Controllers\Panel\Company\UserController as CompanyUserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("panel.home");
Route::post("cache-clear", [HomeController::class, "cache"])->name("panel.cache");

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

    Route::resource('pages', PageController::class)
        ->parameters(['pages' => 'id'])->names([
            'index' => 'panel.config.pages.index',
            'create' => 'panel.config.pages.create',
            'store' => 'panel.config.pages.store',
            'update' => 'panel.config.pages.update',
            'edit' => 'panel.config.pages.edit',
            'destroy' => 'panel.config.pages.destroy',
        ]);

    Route::resource('most-search', MostSearchController::class)
        ->parameters(['most-search' => 'id'])->names([
            'index' => 'panel.config.most-search.index',
            'create' => 'panel.config.most-search.create',
            'store' => 'panel.config.most-search.store',
            'update' => 'panel.config.most-search.update',
            'edit' => 'panel.config.most-search.edit',
            'destroy' => 'panel.config.most-search.destroy',
        ]);

    Route::resource('plans', PlanController::class)
        ->parameters(['plans' => 'id'])->names([
            'index' => 'panel.config.plans.index',
            'create' => 'panel.config.plans.create',
            'store' => 'panel.config.plans.store',
            'update' => 'panel.config.plans.update',
            'edit' => 'panel.config.plans.edit',
            'destroy' => 'panel.config.plans.destroy',
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

    Route::post("import",[CommentController::class,"import"])->name("panel.companies.import");

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

    Route::resource("company.comment", CommentController::class)
        ->parameters(['comment' => 'id'])->names([
            'index' => 'panel.companies.comment.index',
            'create' => 'panel.companies.comment.create',
            'store' => 'panel.companies.comment.store',
            'update' => 'panel.companies.comment.update',
            'edit' => 'panel.companies.comment.edit',
            'destroy' => 'panel.companies.comment.destroy'
        ])->shallow();

    Route::resource("company.user", CompanyUserController::class)
        ->names([
            'index' => 'panel.companies.user.index',
            'create' => 'panel.companies.user.create',
            'store' => 'panel.companies.user.store',
            'update' => 'panel.companies.user.update',
            'edit' => 'panel.companies.user.edit',
            'destroy' => 'panel.companies.user.destroy'
        ]);

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

Route::prefix("contacts")->group(function () {

    Route::resource("users", UserCompanyController::class)
        ->parameters(['users' => 'id'])->names([
            'index' => 'panel.contacts.users.index',
            'create' => 'panel.contacts.users.create',
            'show' => 'panel.contacts.users.show',
            'store' => 'panel.contacts.users.store',
            'update' => 'panel.contacts.users.update',
            'edit' => 'panel.contacts.users.edit',
            'destroy' => 'panel.contacts.users.destroy',
        ]);

    Route::resource("bulletin", BulletinController::class)
        ->parameters(['bulletin' => 'id'])->names([
            'index' => 'panel.contacts.bulletin.index',
            'destroy' => 'panel.contacts.bulletin.destroy',
        ]);
});
