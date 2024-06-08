<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";

    protected $fillable = [
        "name",
        "svg",
        "color",
        "menu_status",
        "category_status",
        "order",
        "status",
        "slug"
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $slug = Str::slug($model->name, "-", "tr");
            $exist = Course::where("slug", $slug)->first();
            if ($exist) {
                $model->slug = Str::slug($model->name . rand(1, 50), "-", "tr");
            } else {
                $model->slug = $slug;
            }
        });

        static::updating(function ($model) {
            $slug = Str::slug($model->name, "-", "tr");
            $exist = Course::where("slug", $slug)->first();
            if ($exist) {
                $model->slug = Str::slug($model->name . rand(1, 50), "-", "tr");
            } else {
                $model->slug = $slug;
            }
        });
    }
}
