<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanyRequest extends Model
{
    use HasFactory;

    protected $table = "user_company_requests";

    protected $fillable = [
        'files',
        'status',
        "approve",
        "new_company",
        "proxy",
        "id_card_front",
        "id_card_back",
        "permit",
    ];
}
