<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
}
