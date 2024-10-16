<?php

namespace App\Http\Controllers;

use App\Models\subscriptionPlan;
use Brian2694\Toastr\Facades\Toastr;
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
        $provider->setAccessToken($paypalToken);
        $id = $request->id;
        $cost=subscriptionPlan::find($id)->cost;

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success', $id),
                "cancel_url" => route('paypal.payment.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $cost,
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
            Toastr::error($response['error']['message'] ?? 'Something went wrong.', 'Paypal Error');
            return redirect()
                ->route('pay.subscription', $id)
                ->with('error', 'Something went wrong.');

        } else {
            Toastr::error($response['error']['message'] ?? 'Something went wrong.', 'Paypal Error');
            return redirect()
                ->route('pay.subscription', $id)
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
    public function paymentSuccess(Request $request, $id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('subscript', $id)
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('account.subscription')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
