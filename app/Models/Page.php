<?php

namespace App\Models;

use App\Traits\ImageTrait;
use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, SeoTrait,ImageTrait;

    protected $table = "pages";

    protected $fillable = [
        "title",
        "content",
        "status",
    ];

}
