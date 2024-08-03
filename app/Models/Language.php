<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Language extends Model
{
    use HasFactory;

    protected $table = "language";

    public $timestamps = false;

    protected $fillable = [
        "value",
        "language"
    ];

    protected static function booted(): void
    {
        static::updated(function () {
            $cacheKey = 'languages.tr';
            Cache::forget($cacheKey);
        });
    }
}
