<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Bet;

class PostsController extends Controller
{
    //
    public $posts, $perPage, $subscriptions;

    public function __construct() {
        $this->posts = [];
        $this->perPage = 15;
        $this->subscriptions = subscriptionPlan::all()->toArray();
    }

    public function index() {
        $this->posts=Bet::with('subscriptionPlan')->paginate($this->perPage)->sortByDesc('created_at')->toArray();
        return view("admin.posts")->with('content', 'index')->with('posts', $this->posts);
    }

    public function create() {
        return view('admin.posts')->with('content','create')->with('subscriptions', $this->subscriptions);
    }

    public function store(Request $request) {
        //dd($_FILES);
        $request->validate([
            'event'=> 'required|max:255',
            'hidden'=> 'required',
            'description'=> 'max:255',
            'pick'=> 'max:255',
            'image'=> 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            'subscription'=> 'required|max:255',
            'odds'=> 'max:255',
            'stake'=> 'max:255',
            'gain'=> 'max:255',
            'profit'=> 'max:255',
            'status'=>'required',
        ]);
        $image_url = $request->image->store('image', 'public');
        Bet::create([
            'event'=> $request->event,
            'hidden'=> $request->hidden,
            'status'=> $request->status,
            'date'=> $request->date,
            'description'=>$request->description,
            'pick'=>$request->pick,
            'image'=>$image_url,
            'subscription_plan_id'=>$request->subscription,
            'odds'=>$request->odds,
            'stake'=>$request->stake,
            'gain'=>$request->gain,
            'profit'=>$request->profit,
        ]);

        return redirect()->route('admin.posts');
    }

    public function edit($id) {
        $post=Bet::find($id)->toArray();
        return view('admin.posts')->with('content','edit')->with('post', $post)->with('subscriptions', $this->subscriptions);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'event'=> 'required|max:255',
            'hidden'=> 'required',
            'status'=> 'required',
            'description'=> 'max:255',
            'pick'=> 'max:255',
            'image'=> 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            'subscription'=> 'required|max:255',
            'odds'=> 'max:255',
            'stake'=> 'max:255',
            'gain'=> 'max:255',
            'profit'=> 'max:255',
        ]);

        $image_url = $request->image->store('image', 'public');

        Bet::find($id)->update([
            'event'=> $request->event,
            'hidden'=> $request->hidden,
            'status'=> $request->status,
            'date'=> $request->date,
            'description'=>$request->description,
            'pick'=>$request->pick,
            'image'=>$image_url,
            'subscription_plan_id'=>$request->subscription,
            'odds'=>$request->odds,
            'stake'=>$request->stake,
            'gain'=>$request->gain,
            'profit'=>$request->profit,
        ]);

        return redirect()->route('admin.posts');
    }

    public function delete($id) {
        Bet::find($id)->delete();
        return redirect()->route('admin.posts');
    }
}
