<?php

namespace App\Http\Controllers;

use App\Models\subscriptionPlan;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    //

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $cost = $request->cost;
  
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success'),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $cost
                    ]
                ]
            ]
        ]);
  
        if (isset($response['id']) && $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
  
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel()
    {
        return redirect()
              ->route('account.subscription')
              ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
  
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('accout.subscription')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('account.subscription')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
