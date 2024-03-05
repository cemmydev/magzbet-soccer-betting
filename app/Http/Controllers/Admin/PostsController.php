<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public $posts, $perPage;

    public function __construct() {
        $this->posts = [];
        $this->perPage = 15;
    }

    public function index() {
        $this->posts=Post::paginate($this->perPage)->sortBy('created_at', 1)->toArray();
        return view("admin.posts")->with('posts', $this->posts);
    }
}
