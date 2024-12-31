<?php

namespace App\Http\Controllers\Panel\Config;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Enums\PaymentType;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\MostSearch;
use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use App\Service\Helper;
use Carbon\Carbon;
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
        $users = User::query()->where("role", UserRole::COMPANY)->get();
        return view("panel.pages.config.order.create", compact(["users"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "user_id" => "required|exists:users,id",
            "price" => "required|numeric",
            "type" => "required",
            "description" => "required",
            "piece" => "required",
        ]);

        $totalPrice = request("price") * $request->get("piece");
        $orderId = Helper::generateRandomCode();
        $user = User::query()->findOrFail($request->get("user_id"));

        $shippingAddress = [
            "name" => $user->name,
            "email" => $user->email,
            "address" => null,
            "city" => $user->city,
            "district" => $user->district,
            "postal_code" => null,
            "phone" => $user->phone,
            "order_notes" => null,
        ];



        $order = new Order();
        $order->forceFill([
            "user_id" => (int)$request->get("user_id"),
            "plan_type" => $request->get("type"),
            "payment_type" => "paytr",
            "payment_status" => PaymentStatus::UNPAID,
            "shipping_address" => json_encode($shippingAddress),
            "code" => $orderId,
            "price" => $totalPrice,
            "status" => OrderStatus::PENDING,
            "viewed" => true,
            "piece" => $request->get("piece"),
            "payment_detail" => $request->get("description"),
        ])->save();

        return redirect()->route("panel.config.orders.index")->with("success", "Sipariş Oluşturma Başarılı");
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
    public function destroy(string $id): RedirectResponse
    {
        $order = Order::query()->findOrFail($id);
        $order->delete();
        return redirect()->back()->with("success","Sipariş Başarıyla Silindi");
    }

    public function accept(string $id): RedirectResponse
    {
        $order = Order::query()->findOrFail($id);

        switch ($order->plan->type):
            case PaymentType::MOST_SEARCHED:
                $companyIds = json_decode($order->companies, true);

                if (!is_array($companyIds)) {
                    $companyIds = [$companyIds];
                }

                $daysToAdd = $order->plan->period->days();
                $remainingDate = $daysToAdd !== null ? Carbon::now()->addDays($daysToAdd) : null;

                foreach ($companyIds as $companyId) {
                    $model = new MostSearch();
                    $model->forceFill([
                        "company_id" => $companyId,
                        "added_by" => "System",
                        "order_id" => $order->id,
                        "remaining_date" => $remainingDate,
                        "status" => true,
                    ])->save();
                }

                break;
        endswitch;

        $order->update([
            "status" => OrderStatus::PUBLISHED
        ]);

        return redirect()->back()->with("success", "İşlem Başarılı");
    }
}
