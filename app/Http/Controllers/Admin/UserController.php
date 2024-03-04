<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public $usersData, $perPage, $sortByField, $sortByDirection, $search;

    public function __construct() {
        $this->usersData=[];
        $this->sortByField='id';
        $this->sortByDirection='desc';
        $this->perPage=15;
        $this->search= '';
    }
    public function index(Request $request) {
        $this->sortByField= $request->sortByField;
        $this->sortByDirection=$request->sortByDirection;
        $this->perPage=$request->perPage;
        $this->usersData=User::where('name', 'like', '%'.$this->search.'%')->orwhere('email', 'like', '%'.$this->search.'%')
            ->paginate($this->perPage)
            ->sortBy($this->sortByField, $this->sortByDirection)->toArray();
        return view("admin.users")->with("usersData",$this->usersData)->with('tabIndex', 'users');
    }
}
