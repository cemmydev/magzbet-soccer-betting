<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLogin extends Model
{
	protected $fillable = [
		'params',
	];

	protected $casts = [
		'params' => 'array',
	];

	public function user() : BelongsTo {
		return $this->belongsTo(User::class);
	}
}
