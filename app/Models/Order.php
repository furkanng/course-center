<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $casts = [
      "payment_status" => PaymentStatus::class,
      "status" => OrderStatus::class
    ];

    protected $fillable = [
        "plan_type",
        "shipping_address",
        "payment_type",
        "payment_status",
        "payment_detail",
        "price",
        "code",
        "viewed",
        "status",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'plan_id', "id");
    }
}
