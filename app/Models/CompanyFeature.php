<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyFeature extends Model
{
    use HasFactory;

    protected $table = 'company_features';

    protected $fillable = [
        "feature_id",
        "company_id"
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
}
