<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriptionPlan;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $usersData, $perPage, $sortByField, $sortByDirection, $search;
    public $subscriptions;

    public function __construct() {
        $this->usersData=[];
        $this->sortByField='id';
        $this->sortByDirection='desc';
        $this->perPage=15;
        $this->search= '';
        $this->subscriptions=subscriptionPlan::all()->toArray();
    }
    public function index(Request $request) {
        $this->sortByField= $request->sortByField;
        $this->sortByDirection=$request->sortByDirection;
        $this->perPage=$request->perPage;
        $this->usersData=User::with('subscriptionPlans')->get()->sortBy($this->sortByField, $this->sortByDirection);
        return view("admin.users")->with('index', 'index')->with("usersData", $this->usersData)->with('tabIndex', 'users');
    }

    public function create() {
        return view('admin.users.create')->with('subscriptions', $this->subscriptions);
    }

    public function delete(Request $request, $id) {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
    }

    public function edit(Request $request, $id) {
        $user = User::find($id);
        return view('admin.users')->with('index', 'edit')->with('user', $user);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect()->route('admin.users');
    }

    public function expire(Request $request, $id, $sid) {
        DB::table('subscription_plan_user')->where('id', $sid)->update(['expire_at' => date('Y-m-d')]);
        return redirect()->route('admin.users.edit', $id);
    }

    public function getActiveUsers() {
        $active_users = DB::table('sessions')->whereNotNull('user_id')->count();
        return response()->json(['active'=> $active_users], 200);
    }
}
