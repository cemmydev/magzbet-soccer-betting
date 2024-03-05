<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\subscriptionPlan;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = [
        "hidden",
        "event",
        "date",
        "odds",
        "status",
        "image",
        "stake",
        "gain",
        "profit",
        "description",
    ];

    public function subscriptionPlan() : BelongsTo {
        return $this->belongsTo(subscriptionPlan::class);
    }
}
