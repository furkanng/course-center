<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "courses";

    protected $fillable = [
        "name",
        "svg",
        "menu_status",
        "category_status",
        "order",
        "status",
    ];
}
