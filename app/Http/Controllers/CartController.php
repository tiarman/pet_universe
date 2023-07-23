<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Animal;
// use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
// use Darryldecode\Cart\Facades\Cart;
use Cart;
class CartController extends Controller
{

    public function cartList()
    {
        $cartItems = Cart::content();
        // // $data ['category'] = Category::where('status', '=', Category::$statusArray[0])->get();
        // // dd($cartItems);
        // // foreach ($cartItems as $cartItem) {
        // //     $image = $cartItem->getAttributes()['image'];
        // // return $image;
        // // return $cartItems;
        // // return $cartItems->attributes['image'];
        // return session()->all();
        return view('site.cart_page', compact('cartItems'));
    }
    
    public function store(Request $request)
    {

        // \Cart::add(array(
        //     'id' => $request->id, // inique row ID
        //     'name' => $request->name,
        //     'price' => $request->selling_price,
        //     'quantity' => $request->stock_quantity,
        //     'image' => $request->image,
        //     'attributes' => array()
        // ));
        // $message = "Card Added Successfully";
        // return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
        // return session()->all();
        // Log::info('Data received in addToCart:', $request->all());

            $animal_id = $request->id;
    $animal = Animal::find($animal_id);
        if ($animal->discount_price==NULL){
            \Cart::add([
                'id' => $animal->id,
                'name' => $animal->name,
                'price' => $animal->selling_price,
                'quantity' => 1,
                'image' => $animal->image,
                'weight' => '1',
                'qty' => '1',
                'tax'=>'0',
                'options' => ['image'=>$animal->image]
            ]);

        }else
        \Cart::add([
            'id' => $animal->id,
            'name' => $animal->name,
            'price' => $animal->discount_price,
            'quantity' => 1,
            'image' => $animal->image,
            'weight' => '1',
            'qty' => '1',
            'tax'=>'0',
            'options' => ['image'=>$animal->image]
            // 'options' => array(
            //     'image' => $animal->image,
            //     'discount_price' => $animal->discount_price,
            //     // 'stock_quantity' => $animal->stock_quantity,
            //     // // 'user_id'=>$animal->user_is,
            //     // 'subcategory_id' => $animal->subcategory_id,

            // )
        ]);
        // return $request;
        session()->flash('success', 'Product is Added to Cart Successfully !');
        //        return \Cart::getContent();
        $status = "Card Added Successfully";
        // return session()->all();
        return RedirectHelper::routeSuccess2('shopping.cartlist', $status);
    }


    public function removeCart($rowId)
    {

        $rowId = \Cart::content()->value('rowId');
        // return $cart;
        \Cart::remove($rowId);
        // // session()->flash('success', 'Item Cart Remove Successfully !');
        // $userID = auth()->id();
        // \Cart::session($userID)->remove($cart);

        $message = 'Item Cart Remove Successfully !';
        return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
    }

//     public function store(Request $request){
//     $animal_id = $request->id;
//     $animal = Animal::find($animal_id);

//         // \Cart::add();
//         \Cart::add(array(
//     'id' => $animal->id, // inique row ID
//     'name' => $animal->name,
//     'price' => $animal->price,
//     'quantity' => 1,
//     weight
//     'attributes' => array(
//         'img' => $animal->image,
//     )
// ));


// \Cart::add([
//     'id' => $animal->id,
//     'name' => $animal->name,
//     'price' => $animal->price,
//     'quantity' => $animal->quantity,
//     'attributes' => array(
//         'image' => $animal->image,
//     )
// ]);


}
