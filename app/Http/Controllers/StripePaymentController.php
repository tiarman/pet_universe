<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Stripe\Charge;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('site.stripeCheckout');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    { 
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment =   Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com.",
            "shipping" => [

                "name" => "Jenny Rosen",

                "address" => [

                    "line1" => "510 Townsend St",

                    "postal_code" => "98140",

                    "city" => "San Francisco",

                    "state" => "CA",

                    "country" => "US",

                ],

            ]
        ]);
        
        Session::flash('success', 'Payment successful!');
// return $payment;
// source-id will be save in db

        return back();
    }
}
