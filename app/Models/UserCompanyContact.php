<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanyContact extends Model
{
    use HasFactory;

    protected $table = "user_contact_to_company";

    protected $fillable = [
        "customer_name",
        "customer_email",
        "customer_phone",
        "review"
    ];
}
