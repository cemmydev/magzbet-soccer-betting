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
        $this->tableheader=['Name','Cost'];
        $this->subscription = [];
    }

    public function index() {
        // $sub = User::find(1)->subscriptionPlans()->withPivot("updated_at")->get()->toArray();
        //dd($sub);
        $this->subscriptions=subscriptionPlan::all()->toArray();
        // dd($this->subscriptions);
        return view('admin.subscriptions')->with('data',$this->subscriptions)->with('tabIndex','subscriptions')->with('tableheader',$this->tableheader)->with('content','users.index');
    }

    public function edit(Request $request, string $id) {

        $this->subscription = subscriptionPlan::find($id)->toArray();

        return view('admin.subscriptions')->with('subinfo', $this->subscription)->with('content','subscriptions.edit');
    }

    public function update(Request $request, string $id) {

        $this->subscription = subscriptionPlan::find($id);

        $this->subscription->name = $request['name'];
        $this->subscription->cost = $request['cost'];

        $this->subscription -> save();

        return redirect() -> route('admin.subscriptions');
    }

    public function delete(Request $request, string $id) {

        $this->subscription = subscriptionPlan::find($id);
        $this->subscription -> delete();

        return redirect() -> route('admin.subscriptions');
    }

    public function create() {
    }
}
