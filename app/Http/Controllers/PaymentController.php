<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function buy(Request $request, $id){
        Auth::user()->subscriptionPlans()->attach([$id]);
        return redirect()->route('account.subscriptions');
    }
}
