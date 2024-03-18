<?php

namespace App\Http\Controllers;

use App\Models\subscriptionPlan;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function buy(Request $request, $id){
        $sub = subscriptionPlan::find($id)->toArray();
        return  view('paypal')->with('sub', $sub);
        $start_at = strtotime(now()->toString());
        $unexpired_plans=Auth::user()->unexpiredSubscription();
        foreach($unexpired_plans as $plan) {
            if($plan['id'] == $id) {
                $start_at = max($start_at, strtotime('+1 Day', strtotime($plan['pivot']['expire_at'])));
            }
        }
        $expire_at= strtotime('-1 Day', strtotime('+1 Month', $start_at));
        Auth::user()->subscriptionPlans()->attach([$id => ['start_at' => date('Y-m-d', $start_at), 'expire_at' => date('Y-m-d', $expire_at)]]);
        return redirect()->route('account.subscriptions');
    }
}
