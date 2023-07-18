<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\AnimalFile;
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
    $data ['animals'] = Animal::where('status', '=', Animal::$statusArrays[0])->get();
    // return $datas;
    return view('site.index', $data);

}


public function animal_details($name = null, $id=NULL)
{
    // $cartItems = \Cart::getContent();
    // $category=Category:: where('status','=',Category::$statusArray[0])->get();

    if ($animal = Animal::where('name', $name)->where('status', Animal::$statusArrays[0])->first()){
      $related_animal = Animal::where('subcategory_id', $animal->subcategory_id)->take(10)->get();
      $animal_files = AnimalFile::where('animal_id', $animal->id)->get();
      // return $product_file;

       
        return view('site.animal_details', compact('animal', 'related_animal', 'animal_files'));

    }
    return RedirectHelper::backWithWarning('<strong>Sorry!!! </strong> Animal not found.');
}















}
