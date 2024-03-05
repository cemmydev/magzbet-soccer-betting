<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public $subscriptions;

    public function __construct() {
        $this->subscriptions = [];
    }

    public function index() {
        $sub = User::find(1)->subscriptionPlans()->withPivot("updated_at")->get()->toArray();
        dd($sub);
        $this->subscriptions=subscriptionPlan::all()->toArray();
        dd($this->subscriptions);
        return view('admin.subscriptions');
    }
}
