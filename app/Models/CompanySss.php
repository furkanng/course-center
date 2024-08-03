<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySss extends Model
{
    use HasFactory;

    protected $table = 'company_sss';

    protected $fillable = [
        "question",
        "answer",
        "status",
        "order"
    ];
}
