<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FrontImage extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "front_images";

    protected $fillable = [
        "image",
        "image_url"
    ];

    protected static function booted(): void
    {
        static::updated(function () {
            $cacheKey = 'images';
            Cache::forget($cacheKey);
        });
    }
}
