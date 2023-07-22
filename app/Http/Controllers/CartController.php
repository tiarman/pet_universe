<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Animal;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function addToCart(Request $request)
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
        if ($request->discount_price==NULL){
            \Cart::add([
                'id' => $animal->id,
                'name' => $animal->name,
                'price' => $animal->selling_price,
                'quantity' => 1,
                'image' => $animal->image,
                'weight' => '1',
                'qty' => '1',
                'attributes' => array(
                    'image' => $animal->image,
                    'discount_price' => $animal->discount_price,
                    'stock_quantity' => $animal->stock_quantity,
                    // 'user_id'=>$animal->user_is,
                    'subcategory_id' => $animal->subcategory_id,

                )
            ]);

        }else
        \Cart::add([
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
    // public function addToCart(Request $request){
    //     $animal_id = $request->id;
    //     $animal = Animal::find($animal_id);
    
    //         // \Cart::add();
    //         \Cart::add(array(
    //     'id' => $animal->id, // inique row ID
    //     'name' => $animal->name,
    //     'price' => $animal->price,
    //     'quantity' => 1,
    //     'weight' =>0,
    //     'attributes' => array(
    //         'img' => $animal->image,
    //     )
    // ));

    // return back();


    // }
}
