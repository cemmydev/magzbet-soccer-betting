<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Bet;

class subscriptionPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "cost",
        "description",
    ];

    public function bets() : BelongsToMany {
        return $this->belongsToMany(Bet::class);
    }
}