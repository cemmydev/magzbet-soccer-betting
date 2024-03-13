<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Bet;
use Illuminate\Database\Eloquent\SoftDeletes;

class subscriptionPlan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "name",
        "cost",
        "description",
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function bets() : BelongsToMany {
        return $this->belongsToMany(Bet::class);
    }
}