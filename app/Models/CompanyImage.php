<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyImage extends Model
{
    use HasFactory, ImageTrait;

    protected $table = "company_images";

    protected int $width = 770;
    protected int $height = 450;
    protected bool $watermark = true;

    protected $fillable = [
        "image",
        "status",
        "order"
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }
}
