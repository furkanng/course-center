<?php

use App\Http\Controllers\Merchant\Company\CompanyController;
use App\Http\Controllers\Merchant\Company\CompanyImageController;
use App\Http\Controllers\Merchant\Company\PriceController;
use App\Http\Controllers\Merchant\Company\SssController;
use App\Http\Controllers\Merchant\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("merchant.home");

Route::prefix("companies")->group(function () {

    Route::resource("company", CompanyController::class)
        ->parameters(['company' => 'id'])->names([
            'index' => 'merchant.companies.company.index',
            'create' => 'merchant.companies.company.create',
            'store' => 'merchant.companies.company.store',
            'update' => 'merchant.companies.company.update',
            'edit' => 'merchant.companies.company.edit',
            'destroy' => 'merchant.companies.company.destroy',
        ]);

    Route::delete("company/image/{id}", [CompanyController::class, "imageDelete"])
        ->name("merchant.companies.company.image.delete");

    Route::resource("company.image", CompanyImageController::class)
        ->parameters(['image' => 'id'])->names([
            'index' => 'merchant.companies.image.index',
            'create' => 'merchant.companies.image.create',
            'store' => 'merchant.companies.image.store',
            'update' => 'merchant.companies.image.update',
            'edit' => 'merchant.companies.image.edit',
            'destroy' => 'merchant.companies.image.destroy'
        ])->shallow();

    Route::resource("company.sss", SssController::class)
        ->parameters(['sss' => 'id'])->names([
            'index' => 'merchant.companies.sss.index',
            'create' => 'merchant.companies.sss.create',
            'store' => 'merchant.companies.sss.store',
            'update' => 'merchant.companies.sss.update',
            'edit' => 'merchant.companies.sss.edit',
            'destroy' => 'merchant.companies.sss.destroy',
        ])->shallow();

    Route::resource("company.price", PriceController::class)
        ->parameters(['price' => 'id'])->names([
            'index' => 'merchant.companies.price.index',
            'create' => 'merchant.companies.price.create',
            'store' => 'merchant.companies.price.store',
            'update' => 'merchant.companies.price.update',
            'edit' => 'merchant.companies.price.edit',
            'destroy' => 'merchant.companies.price.destroy',
        ])->shallow();

});

