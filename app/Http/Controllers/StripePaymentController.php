<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Stripe\Charge;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {   $cartItems = \Cart::content();
        // return $cartItems;
        return view('site.stripeCheckout',  compact('cartItems'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {  
        // return $request;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $payment =   Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com.",
            // "customer" => $request->name,
            // "billing_details" => [
            //     "name" => $request->name,
            //     "email" => $request->email,
            //     "phone" => $request->phone
            // ],
            "shipping" => [

                "name" => $request->name,
                // "email" => $request->email,
                // "phone" => $request->phone,

                "address" => [

                    "line1" => "",

                    "postal_code" => $request->post_code,

                    "city" => $request->city,

                    // "house" => $request->shipping_address,

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
