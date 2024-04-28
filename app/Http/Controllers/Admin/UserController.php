<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriptionPlan;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $usersData, $perPage, $sortByField, $sortByDirection, $search;
    public $subscriptions;

    public function __construct()
    {
        $this->usersData = [];
        $this->sortByField = 'id';
        $this->sortByDirection = 'desc';
        $this->perPage = 15;
        $this->search = '';
        $this->subscriptions = subscriptionPlan::all()->toArray();
    }
    public function index(Request $request)
    {
        $this->sortByField = $request->sortByField;
        $this->sortByDirection = $request->sortByDirection;
        $this->perPage = $request->perPage;
        $this->usersData = User::with('subscriptionPlans')->with('roles')->get()->sortBy($this->sortByField, $this->sortByDirection);
        return view("admin.users")->with('index', 'index')->with("usersData", $this->usersData)->with('tabIndex', 'users');
    }

    public function create()
    {
        return view('admin.users.create')->with('subscriptions', $this->subscriptions);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        Toastr::success("User deleted successfully.", "Success");
        return redirect()->route('admin.users');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $subscriptions = subscriptionPlan::all();
        return view('admin.users')->with('index', 'edit')->with('user', $user)->with('subscriptions', $subscriptions);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users');
    }

    public function expire(Request $request, $id, $sid)
    {
        DB::table('subscription_plan_user')->where('id', $sid)->update(['expire_at' => date('Y-m-d')]);
        Toastr::success('User' . $id . "'s subscription is expired successfully", "Success!");
        return redirect()->route('admin.users.edit', $id);
    }

    public function getActiveUsers()
    {
        $active_users = DB::table('sessions')->whereNotNull('user_id')->count();
        return response()->json(['active' => $active_users], 200);
    }

    public function addsubscription(Request $request, $id)
    {
        $request->validate([
            'subscription_plan' => 'required',
            'days' => 'required',
        ]);

        $start_at = strtotime(now()->toString());
        $user = User::find($id);
        $unexpired_plans=$user->unexpiredSubscription();
        foreach($unexpired_plans as $plan) {
            if($plan['id'] == $id) {
                $start_at = max($start_at, strtotime('+1 Day', strtotime($plan['pivot']['expire_at'])));
            }
        }
        $expire_at= strtotime('-1 Day', strtotime('+'.($request->days).' Day', $start_at));
        $user->subscriptionPlans()->attach([$request->subscription_plan => ['start_at' => date('Y-m-d', $start_at), 'expire_at' => date('Y-m-d', $expire_at)]]);
        Toastr::success("You have successfully added Subscription.", "Conguratulation");
        return redirect()->route('admin.users.edit', $id);
    }
}
