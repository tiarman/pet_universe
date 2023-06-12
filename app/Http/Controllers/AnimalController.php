<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\Categories;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnimalController extends Controller
{
    public function index()
    {
        $data['data'] = Animal::orderby('created_at', 'desc')->get();
        return view('admin.animal.list', $data);
    }


    public function create()
    {
        $data['categories'] = Categories::get();
        $data['subcategory'] = SubCategory::get();
        $data['pickup_point'] = PickupPoint::get();


        return view('admin.animal.create', $data);
    }

    //manage

    public function manage($id = null)
    {

        if ($data['animal'] = Animal::find($id)) {

       

            $data['categorys'] = Categories::get();
            $data['subcategory'] = SubCategory::get();
            $data['pickuppoint'] = PickupPoint::get();
            // return $datas;
            return view('admin.animal.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('animal.list', '<strong>Sorry!!!</strong> Animal not found');
    }


    public function store(Request $request)
    {
            //    dd($request->all());
        $message = '<strong>Congratulations!!!</strong> Animal successfully';
        $rules = [

            'category_id' => 'nullable|string',
            'subcategory_id' => 'nullable|string',
            'pickup_point_id' => 'nullable|string',
            'name' => 'nullable|string',
            'purchase_price' => 'nullable|string',
            'selling_price' => 'nullable|string',
            'discount_price' => 'nullable|string',
            'stock_quantity' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Animal::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Animal::$statusArrays)],
        ];

        if ($request->has('id')) {
            // return $request;
            $animal = Animal::find($request->id);
            $message = $message . ' updated';
        } else {
            $animal = new Animal();
            $message = $message . ' created';
        }
        $request->validate($rules);

        try {
            $animal->category_id = $request->category_id;
            $animal->subcategory_id = $request->subcategory_id;
            $animal->pickup_point_id = $request->pickup_point_id;
            $animal->name = $request->name;
            $animal->purchase_price = $request->purchase_price;
            $animal->selling_price = $request->selling_price;
            $animal->discount_price = $request->discount_price;
            $animal->stock_quantity = $request->stock_quantity;
            $animal->description = $request->description;
            $animal->status = $request->status;


            $oldImage = $animal->image;
            //            return $animal;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/animal/');
                if ($logo != false) {
                    $animal->image = $logo;
                }
            }
            if ($animal->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }

                return RedirectHelper::routeSuccessWithParams('animal.list', $message);
            }
            return RedirectHelper::backWithInput();
        } catch (QueryException $e) {
            return $e;
            return RedirectHelper::backWithInputFromException();
        }
    }


    public function destroy(Request $request)
    {
        $id = $request->post('id');
        try {
            $user = Animal::find($id);
            $oldImage = $user->image;
            if ($user->delete()) {
                if ($oldImage !== null) {
                    CustomHelper::deleteFile($oldImage);
                }
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }


    /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdateStatus(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $user = Animal::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }



}
