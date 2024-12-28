<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceField extends Model
{
    use HasFactory;

    protected $table = "price_fields";

    protected $fillable = [
        "price_title",
        "status",
    ];
}
