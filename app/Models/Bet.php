<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subscriptionPlan;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        "pick",
        "subscription_plan_id"
    ];

    public function subscriptionPlan() : BelongsToMany {
        return $this->belongsToMany(subscriptionPlan::class)->withTimestamps();;
    }
}
