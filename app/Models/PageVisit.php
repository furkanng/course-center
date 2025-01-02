<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'url',
        'referrer',
        'user_agent',
        'user_id',
        'visited_at',
        'seo_link',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'seo_link', 'url');
    }
}
