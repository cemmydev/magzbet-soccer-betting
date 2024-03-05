<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public $subscriptions;

    public function __construct() {
        $this->subscriptions = [];
    }

    public function index() {
        return view('admin.subscriptions');
    }
}
