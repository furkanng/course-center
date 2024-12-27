<?php

namespace App\Models;

use App\Enums\PaymentType;
use App\Enums\PlanPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $table = "plans";

    protected $casts = [
        'period' => PlanPeriod::class,
        'type' => PaymentType::class,
    ];

    protected $fillable = [
        "name",
        "price",
        "description",
        "type",
        "period",
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'plan_id');
    }
}
