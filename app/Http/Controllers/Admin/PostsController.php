<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bet;

class PostsController extends Controller
{
    //
    public $posts, $perPage;

    public function __construct() {
        $this->posts = [];
        $this->perPage = 15;
    }

    public function index() {
        $this->posts=Bet::with('subscriptionPlan')->paginate($this->perPage)->sortBy('created_at', 1)->toArray();
        return view("admin.posts")->with('content', 'index')->with('posts', $this->posts);
    }

    public function create() {
        return view('admin.posts')->with('content','create');
    }
}
