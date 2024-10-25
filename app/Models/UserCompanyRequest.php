<?php

namespace App\Models;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCompanyRequest extends Model
{
    use HasFactory;

    protected $table = "user_company_requests";

    protected $casts = ["status" => UserStatus::class];

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

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', "id");
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $exist = UserCompanyRequest::query()
                ->where("status", UserStatus::PENDING)
                ->where("user_id", auth()->user()->id)->get();

            $request = UserCompanyRequest::query()
                ->where("status", UserStatus::PENDING)
                ->where("user_id", auth()->user()->id)
                ->where("company_id", $model->company_id)->exists();

            if (count($exist) > 3) {
                session()->flash('error', "Maximum talep sayısına ulaştınız.");
                return false;
            }

            if ($request) {
                session()->flash('error', "Zaten bu kurumu talep ettiniz.");
                return false;
            }
        });

        static::updated(function ($model) {
            if ($model->isDirty(["id_card_front", "id_card_back", "proxy", "permit"])) {
                $model->approve = true;

                $model->withoutEvents(function () use ($model) {
                    $model->save();
                });
            }
        });

    }
}
