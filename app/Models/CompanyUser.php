<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyUser extends Model
{
    use HasFactory;

    protected $table = "company_user";

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
}
