<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    use HasFactory;

    protected $table = "company_images";

    protected $fillable = [
        "image",
        "status",
        "order"
    ];
}
