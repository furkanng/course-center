<?php

namespace App\Http\Controllers\Panel\Config;

use App\Enums\OrderStatus;
use App\Enums\PaymentType;
use App\Http\Controllers\Controller;
use App\Models\MostSearch;
use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $orders = Order::all();
        return view("panel.pages.config.order.index", compact(["orders"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $order = Order::query()->findOrFail($id);
        return view("panel.pages.config.order.edit", compact(["order"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function accept(string $id): RedirectResponse
    {
        $order = Order::query()->findOrFail($id);

        switch ($order->plan->type):
            case PaymentType::MOST_SEARCHED:
                $model = new MostSearch();
                $model->forceFill([
                    "company_id" => 1,
                    "added_by" => "System",
                    "order_id" => $order->id,
                    "remaining_date" => $order->plan->period->days(),
                    "status" => true,
                ])->save();
                break;
        endswitch;

        $order->update([
            "status" => OrderStatus::PUBLISHED
        ]);

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
