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
        $this->subscription = ['name' => '', 'cost' => ''];
    }

    public function index() {

        $this->subscriptions=subscriptionPlan::all()->toArray();

        return view('admin.subscriptions')->with('data',$this->subscriptions)->with('content','index');
    }

    public function edit(Request $request, string $id) {

        $this->subscription = subscriptionPlan::find($id)->toArray();
        
        return view('admin.subscriptions')->with('subinfo', $this->subscription)->with('content','edit');
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name'=> 'required',
            'cost'=> 'required'
        ]);

        $this->subscription = subscriptionPlan::find($id);

        $this->subscription->name = $request['name'];
        $this->subscription->cost = $request['cost'];

        $this->subscription -> save();

        return redirect() -> route('admin.subscriptions');
    }

    public function delete(Request $request, string $id) {

        $this->subscription = subscriptionPlan::find($id);
        $this->subscription->delete();

        return redirect()->route('admin.subscriptions');
    }

    public function store(Request $request) {

        $request->validate([
            'name'=> 'required',
            'cost'=> 'required'
        ]);
        

        subscriptionPlan::create([
            'name'=> $request->name,
            'cost'=> $request->cost,
        ]);

        return redirect()->route('admin.subscriptions');  
    }

    public function create() {
        return view('admin.subscriptions')->with('subinfo', $this->subscription)->with('content','edit');
    }
}
