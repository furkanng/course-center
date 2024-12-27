<?php

namespace App\Http\Controllers\Merchant\Finance;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plans = Plan::query()->where("status", true)->get();
        return view("merchant.pages.finance.plan.index", compact(["plans"]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $plan = Plan::query()->findOrFail($id);
        return view("merchant.pages.finance.plan.show", compact(["plan"]));
    }

}
