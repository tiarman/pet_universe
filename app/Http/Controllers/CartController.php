<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
        // $data ['category'] = Category::where('status', '=', Category::$statusArray[0])->get();
        // dd($cartItems);
        // foreach ($cartItems as $cartItem) {
        //     $image = $cartItem->getAttributes()['image'];
        // return $image;
        // return $cartItems;
        // return $cartItems->attributes['image'];
        return view('site.cart.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        if ($request->discount_price==NULL){
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->selling_price,
                'quantity' => 1,
                'image' => $request->image,
                'weight' => '1',
                'qty' => '1',
                'attributes' => array(
                    'image' => $request->image,
                    'discount_price' => $request->discount_price,
                    'stock_quantity' => $request->stock_quantity,
                    // 'user_id'=>$request->user_is,
                    'subcategory_id' => $request->subcategory_id,

                )
            ]);

        }else
        CartCart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->discount_price,
            'quantity' => 1,
            'image' => $request->image,
            'weight' => '1',
            'qty' => '1',
            'attributes' => array(
                'image' => $request->image,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                // 'user_id'=>$request->user_is,
                'subcategory_id' => $request->subcategory_id,

            )
        ]);
        // return $request;
        session()->flash('success', 'Product is Added to Cart Successfully !');
        //        return \Cart::getContent();
        $message = "Card Added Successfully";
        return RedirectHelper::routeSuccess('shopping.cartlist', $message);
    }




    public function removeCart($id)
    {

        // $cart = \Cart::getContent()->value('rowId');
        \Darryldecode\Cart\Facades\CartFacade::remove($id);
        // // session()->flash('success', 'Item Cart Remove Successfully !');
        // $userID = auth()->id();
        // \Cart::session($userID)->remove($cart);

        $message = 'Item Cart Remove Successfully !';
        return RedirectHelper::routeSuccess('shopping.cartlist', $message);
    }
}
