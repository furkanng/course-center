<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MostSearch extends Model
{
    use HasFactory;

    protected $table = "most_searches";

    protected $fillable = [
        "company_id",
        "added_by",
        "order_id",
        "remaining_date",
        "status",
        "order",
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
}
