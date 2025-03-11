<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MostPreference extends Model
{
    use HasFactory;

    protected $table = 'most_preference';

    protected $fillable = [
        "company_id",
        "added_by",
        "image",
        "description",
        "order_id",
        "remaining_date",
        "status",
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
}
