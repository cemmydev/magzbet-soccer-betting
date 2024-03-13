<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subscriptionPlan;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bet extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function subscriptionPlan() : BelongsToMany {
        return $this->belongsToMany(subscriptionPlan::class)->withTimestamps();;
    }
}
