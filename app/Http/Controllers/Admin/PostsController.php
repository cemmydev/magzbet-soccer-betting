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
        $request->validate([
            'event'=> 'required',
            'hidden'=> 'required',
            'pick'=> 'required',
            'image'=> 'file|mimes:jpg,jpeg,bmp,png',
            'subscription'=> 'required',
            'odds'=> 'numeric|max:255',
            'stake'=> 'numeric|max:255',
        ], [
            'event.required' => "Event is required",
            'hidden.required' => 'Hidden is required',
            'status.required' => 'Status is required',
            'pick.required' => 'Pick is required',
            'subscription.required' => 'Subscription is required',
            'odds.float' => "Odds must be a Number",
            'stake.float' => "Stake must be a Number",
            'gain.float' => "Gain must be a Number",
            'profit.float' => "Profit must be a Number",
            'image.file|mimes:jpg,jpeg,bmp,png' => 'Image Invalid.'
        ]);
        
        $new_bet = Bet::create([
            'event'=> $request->event,
            'hidden'=> $request->hidden,
            'status'=> 'pending',
            'date'=> $request->date,
            'description'=>$request->description,
            'pick'=>$request->pick,
            'odds'=>$request->odds,
            'stake'=>$request->stake,
            'gain'=>$request->gain,
            'profit'=>$request->profit,
        ]);
        $new_bet->subscriptionPlan()->attach($request->subscription);
        
        if(isset($requset->image)) {
            $imageName = time().'.'.$request->image->extension(); 
            $image_url = $request->image->move('uploads/bets/'.$new_bet->id, $imageName);
    
            $new_bet->image=$image_url;
    
            $new_bet->save();
        }
           
        return redirect()->route('admin.posts');
    }
    
    public function edit($id) {
        $post=Bet::with('subscriptionPlan')->find($id)->toArray();
        return view('admin.posts')->with('content','edit')->with('post', $post)->with('subscriptions', $this->subscriptions);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'event'=> 'required',
            'hidden'=> 'required',
            'status'=> 'required',
            'pick'=> 'required',
            'image'=> 'file|mimes:jpg,jpeg,bmp,png',
            'subscription'=> 'required',
            'odds'=> 'numeric|max:255',
            'stake'=> 'numeric|max:255',
        ], [
            'event.required' => "Event is required",
            'hidden.required' => 'Hidden is required',
            'status.required' => 'Status is required',
            'pick.required' => 'Pick is required',
            'subscription.required' => 'Subscription is required',
            'odds.float' => "Odds must be a Number",
            'stake.float' => "Stake must be a Number",
            'gain.float' => "Gain must be a Number",
        ]);

        $image_url = "";

        if(isset($request->image)) {
            $imageName = time().'.'.$request->image->extension(); 
            $image_url = $request->image->move("uploads/bets/".$id, $imageName);
        }

        Bet::find($id)->update([
            'event'=> $request->event,
            'hidden'=> $request->hidden,
            'status'=> $request->status,
            'date'=> $request->date,
            'description'=>$request->description,
            'pick'=>$request->pick,
            'image'=>$image_url,
            'odds'=>$request->odds,
            'stake'=>$request->stake,
        ]);

        Bet::find($id)->subscriptionPlan()->sync($request->subscription);

        return redirect()->route('admin.posts');
    }

    public function delete($id) {
        Bet::find($id)->delete();
        return redirect()->route('admin.posts');
    }
    
    public function win($id) {
        $bet = Bet::find($id);
        $bet->status="won";
        $bet->gain = $bet->odds * $bet->stake;
        $bet->profit = $bet->gain - $bet->stake;
        
        $bet->save();
        return redirect()->route('admin.posts');
    }

    public function lose($id) {
        $bet = Bet::find($id);
        $bet->status="lost";
        $bet->gain=0;
        $bet->profit=-$bet->stake;
        
        $bet->save();
        return redirect()->route('admin.posts');
    }
}
