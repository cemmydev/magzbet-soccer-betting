<?php

namespace App\Http\Controllers;

use App\Models\subscriptionPlan;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function buy(Request $request, $id){
        $sub = subscriptionPlan::find($id)->toArray();
        return  view('paypal')->with('sub', $sub);
    }
    
    public function subscript(Request $request, $id){
        $start_at = strtotime(now()->toString());
        $unexpired_plans=Auth::user()->unexpiredSubscription();
        foreach($unexpired_plans as $plan) {
            if($plan['id'] == $id) {
                $start_at = max($start_at, strtotime('+1 Day', strtotime($plan['pivot']['expire_at'])));
            }
        }
        $expire_at= strtotime('-1 Day', strtotime('+1 Month', $start_at));
        Auth::user()->subscriptionPlans()->attach([$id => ['start_at' => date('Y-m-d', $start_at), 'expire_at' => date('Y-m-d', $expire_at)]]);
        Toastr::success("You have successfully purchased Subscription.", "Conguratulation");
        return redirect()->route('account.subscriptions');
    }
}
