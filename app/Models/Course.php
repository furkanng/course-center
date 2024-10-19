<?php

namespace App\Models;

use App\Traits\SeoTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory, SeoTrait;

    protected $table = "courses";

    protected $fillable = [
        "name",
        "svg",
        "menu_status",
        "category_status",
        "order",
        "status",
    ];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_course');
    }
}
