<?php

namespace App\Models;

use App\Models\Traits\HasPermissions;
use App\Models\Traits\HasProfilePhoto;
use App\Models\Traits\HasRoles;
use App\Models\Traits\Relations\UserRelations;
use App\Models\Traits\Scopes\UserScopes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
	use HasFactory;
	use HasPermissions;
	use HasProfilePhoto;
	use HasRoles;
	use Notifiable;
	use SoftDeletes;
	use UserRelations;
	use UserScopes;

	protected $fillable = [
		'name',
		'email',
		'password',
		'profile_photo_path',
		'status',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
		'deleted_at' => 'datetime',
	];

	/*-- Mutators ----------------------------------------------------------------------------------------------------*/
	public function setPasswordAttribute($value): string
	{
		return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
	}

	public function unexpiredSubscription() {
		$subscriptions = $this->subscriptionPlans()->get()->toArray();
		$subscriptions = array_filter($subscriptions, function ($subscription) {
			return strtotime($subscription['pivot']['expire_at']) > strtotime(now()->toString());
		});
		usort($subscriptions, function($a, $b) {
			return $a['pivot']['expire_at'] < $b['pivot']['expire_at'];
		});
		return $subscriptions;
	}

	public function isAllow($bet_subs) {
		$unexpired = $this->unexpiredSubscription();
		foreach($unexpired as $subscription) {
			foreach($bet_subs as $sub){
				if($subscription['id'] == $sub['id']) {
					return true;
				}
			}
		}
		return false;
	}
}
