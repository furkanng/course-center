<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionalRegister extends Model
{
    use HasFactory;
    protected $table = "institutional_register";

    protected $fillable = [
        "user_id",
        "status",
        "company_name",
        "company_type",

    ];
}
