<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    function createOrStore (Request $request){
        if($request->isMethod('GET')){
            return view('admin.food.create');
        }
    }
}
