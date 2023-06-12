<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\SubCategory;

class SiteController extends Controller {

  public function dashboard() {
//    return view('dashboard');
    return view('admin.index');
  }

  public function profile() {
    return view('admin.profile');
  }

//  public function userProfile() {
//    return to_route('profile');
//  }

  public function logout() {
    \auth()->logout();
    \session()->flush();
    return redirect()->route('login');
  }







//   Start Here

public function home(){
    $data ['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
    $data ['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
    $data ['product'] = Product::where('status', '=', Product::$statusArrays[0])->get();
    // return $datas;
    return view('site.index', $data);

}















}
