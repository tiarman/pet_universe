<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Categories;
use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
// use Stripe\Charge;
use Stripe;

class StripePaymentController extends Controller
{
    public function paymentCheckout()
    {
        $cartItems = \Cart::content();
        $data['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
        $data['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
        // return $cartItems;
        return view('site.stripeCheckout', $data,  compact('cartItems'));
    }

    //_orderplace_____
    public function OrderPlace(Request $request)
    {
        $order = array();
        $order['user_id'] = Auth::id();
        $order['name'] = $request->name;
        $order['phone'] = $request->phone;
        $order['shipping_address'] = $request->shipping_address;
        $order['email'] = $request->email;
        $order['post_code'] = $request->post_code;
        $order['city'] = $request->city;
        $order['subtotal'] = \Cart::subtotal();
        $order['total'] = \Cart::total();
        $order['payment_type'] = $request->payment_type;

        // dd($order);
        $order_id = DB::table('orders')->insertGetId($order);
        //order details
        $content = \Cart::content();
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['animal_id'] = $row->id;
            $details['animal_name'] = $row->name;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['subtotal_price'] = $row->price * $row->qty;
            DB::table('order_details')->insert($details);
        }
        \Cart::destroy();

        $notification = array('messege' => 'Successfullt Order Placed!', 'alert-type' => 'success');
        return redirect()->to('/')->with($notification);
    }
}
