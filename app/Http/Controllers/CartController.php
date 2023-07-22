<?php

namespace App\Http\Controllers;

use App\Models\Animal;
// use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
// use Darryldecode\Cart\Facades\Cart;
use Cart;
class CartController extends Controller
{
    

    public function store(Request $request){
$animal_id = $request->id;
$animal = Animal::find($animal_id);
// dd($animals);
        // $Product = Animal::find($animal_id);
        // array format

        \Cart::add();
// \Cart::add(array(
//     'id' => $animal->id, // inique row ID
//     'name' => $animal->name,
//     'price' => $animal->price,
//     'quantity' => 1,
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

return back();


    }
}
