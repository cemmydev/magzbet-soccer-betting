<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bet;

class subscriptionPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "cost"
    ];

    public function bets() : HasMany {
        return $this->hasMany(Bet::class);
    }
}
