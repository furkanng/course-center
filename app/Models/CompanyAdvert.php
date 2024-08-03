<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAdvert extends Model
{
    use HasFactory;

    protected $table = "company_adverts";

    protected $fillable = [
        "image",
        "content",
        "title",
        "status"
    ];
}
