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
        $this->usersData=User::where('name', 'like', '%'.$this->search.'%')->orwhere('email', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage)
            ->sortBy($this->sortByField, $this->sortByDirection)->toArray();
        return view("admin.users")->with("usersData", $this->usersData)->with('tabIndex', 'users');
    }

    public function create() {
        return view('admin.users.create')->with('subscriptions', $this->subscriptions);
    }

    public function delete(Request $request, $id) {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
    }

    public function getActiveUsers() {
        $active_users = DB::table('sessions')->whereNotNull('user_id')->count();
        return response()->json(['active'=> $active_users], 200);
    }
}
