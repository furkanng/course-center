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
}
