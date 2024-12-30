<?php

namespace App\Http\Controllers\Merchant\Account;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = auth()->user()->orders()->latest()->get();

        return view('merchant.pages.account.order.index', compact(["orders"]));
    }


    public function billing($orderId): View
    {
        auth()->user()->orders()->findOrFail($orderId);

        $order = Order::query()->findOrFail($orderId);
        return view('merchant.pages.account.order.edit', compact('order'));
    }
}
