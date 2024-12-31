<?php

use App\Http\Controllers\Merchant\Account\OrderController;
use App\Http\Controllers\Merchant\Account\ProfileController;
use App\Http\Controllers\Merchant\Company\CompanyController;
use App\Http\Controllers\Merchant\Company\CompanyImageController;
use App\Http\Controllers\Merchant\Company\MyRequestController;
use App\Http\Controllers\Merchant\Company\PriceController;
use App\Http\Controllers\Merchant\Company\RequestController;
use App\Http\Controllers\Merchant\Company\SssController;
use App\Http\Controllers\Merchant\Contact\UserCompanyController;
use App\Http\Controllers\Merchant\Finance\PaymentController;
use App\Http\Controllers\Merchant\Finance\PlanController;
use App\Http\Controllers\Merchant\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "home"])->name("merchant.home");

Route::prefix("companies")->group(function () {

    Route::resource("company", CompanyController::class)
        ->parameters(['company' => 'id'])->names([
            'index' => 'merchant.companies.company.index',
            'create' => 'merchant.companies.company.create',
            'store' => 'merchant.companies.company.store',
            'show' => 'merchant.companies.company.show',
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
            'show' => 'merchant.companies.image.show',
            'update' => 'merchant.companies.image.update',
            'edit' => 'merchant.companies.image.edit',
            'destroy' => 'merchant.companies.image.destroy'
        ])->shallow();

    Route::resource("company.sss", SssController::class)
        ->parameters(['sss' => 'id'])->names([
            'index' => 'merchant.companies.sss.index',
            'create' => 'merchant.companies.sss.create',
            'store' => 'merchant.companies.sss.store',
            'show' => 'merchant.companies.sss.show',
            'update' => 'merchant.companies.sss.update',
            'edit' => 'merchant.companies.sss.edit',
            'destroy' => 'merchant.companies.sss.destroy',
        ])->shallow();

    Route::resource("company.price", PriceController::class)
        ->parameters(['price' => 'id'])->names([
            'index' => 'merchant.companies.price.index',
            'create' => 'merchant.companies.price.create',
            'store' => 'merchant.companies.price.store',
            'show' => 'merchant.companies.price.show',
            'update' => 'merchant.companies.price.update',
            'edit' => 'merchant.companies.price.edit',
            'destroy' => 'merchant.companies.price.destroy',
        ])->shallow();

    Route::resource("request", RequestController::class)
        ->parameters(['request' => 'id'])->names([
            'index' => 'merchant.companies.request.index',
            'create' => 'merchant.companies.request.create',
            'store' => 'merchant.companies.request.store',
            'show' => 'merchant.companies.request.show',
            'update' => 'merchant.companies.request.update',
            'edit' => 'merchant.companies.request.edit',
            'destroy' => 'merchant.companies.request.destroy',
        ]);

    Route::resource("my-request", MyRequestController::class)
        ->parameters(['my-request' => 'id'])->names([
            'index' => 'merchant.companies.my-request.index',
            'create' => 'merchant.companies.my-request.create',
            'store' => 'merchant.companies.my-request.store',
            'update' => 'merchant.companies.my-request.update',
            'edit' => 'merchant.companies.my-request.edit',
            'destroy' => 'merchant.companies.my-request.destroy',
        ]);

});

Route::prefix("finance")->group(function () {

    Route::resource("plans", PlanController::class)
        ->parameters(['plans' => 'id'])->names([
            'index' => 'merchant.finance.plans.index',
            'show' => 'merchant.finance.plans.show',
        ])->only(["index", "show"]);

    Route::post("plans/payment/{plan_id}", [PaymentController::class, "store"])->name("merchant.finance.plans.payment");

    Route::get("plans/payment/success", [PaymentController::class, "success"])->name("merchant.finance.plans.payment.success");
    Route::get("plans/payment/error", [PaymentController::class, "error"])->name("merchant.finance.plans.payment.error");

});

Route::prefix("contacts")->group(function () {

    Route::resource("users", UserCompanyController::class)
        ->parameters(['users' => 'id'])->names([
            'index' => 'merchant.contacts.users.index',
            'create' => 'merchant.contacts.users.create',
            'show' => 'merchant.contacts.users.show',
            'store' => 'merchant.contacts.users.store',
            'update' => 'merchant.contacts.users.update',
            'edit' => 'merchant.contacts.users.edit',
            'destroy' => 'merchant.contacts.users.destroy',
        ]);
});

Route::prefix("account")->group(function () {

    Route::get("profile", [ProfileController::class, "index"])->name("merchant.account.profile.index");
    Route::post("profile-delete", [ProfileController::class, "delete"])->name("merchant.account.profile.delete");
    Route::post("profile-update-password", [ProfileController::class, "updatePassword"])->name("merchant.account.profile.updatePassword");
    Route::post("profile-update", [ProfileController::class, "update"])->name("merchant.account.profile.update");

    Route::get("orders", [OrderController::class, "index"])->name("merchant.account.order.index");
    Route::get("order/payment/{order_id}", [OrderController::class, "payment"])->name("merchant.account.order.payment");
    Route::post("order/payment/{order_id}", [OrderController::class, "paymentPost"])->name("merchant.account.order.payment");
    Route::get("orders/billing/{order_id}", [OrderController::class, "billing"])->name("merchant.account.order.billing");
});
