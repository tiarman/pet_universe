<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{


    public function index()
    {
        $data['data'] = Slider::orderby('created_at', 'desc')->get();
        return view('admin.slider.list', $data);
    }


    public function create()
    {
        return view('admin.slider.create');
    }

    //manage

    public function manage($id = null)
    {
        if ($data['slider'] = Slider::find($id)) {
            return view('admin.slider.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('slider.list', '<strong>Sorry!!!</strong> Slider not found');
    }


    public function store(Request $request)
    {
//        dd($request->all());
        $message = '<strong>Congratulations!!!</strong> Slider successfully ';
        if ($request->has('id')) {
            $slider = Slider::find($request->id);
            $rules['title'] = 'nullable|string';
            $rules['description'] = 'nullable|string';
            $rules['btn_title'] = 'nullable|string';
            $rules['btn_link'] = 'nullable|string';
            $rules['image'] = 'nullable|file|mimes:png,jpg,jpeg,svg';
            $rules['status'] = ['required', 'string', Rule::in(\App\Models\Slider::$statusArray)];
            $message = $message . ' updated';
        } else {
            $slider = new Slider();
            $rules['title'] = 'nullable|string';
            $rules['description'] = 'nullable|string';
            $rules['btn_title'] = 'nullable|string';
            $rules['btn_link'] = 'nullable|string';
            $rules['image'] = 'nullable|file|mimes:png,jpg,jpeg,svg';
            $rules['status'] = ['required', 'string', Rule::in(Slider::$statusArray)];
            $message = $message . ' created';
        }
        $request->validate($rules);

        try {
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->btn_title = $request->btn_title;
            $slider->btn_link = $request->btn_link;
            $slider->status = $request->status;
            $oldImage = $slider->image;
//            return $slider;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/slider/');
                if ($logo != false) {
                    $slider->image = $logo;
                }
            }
            if ($slider->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }
                return RedirectHelper::routeSuccessWithParams('slider.list', $message);
            }
            return RedirectHelper::backWithInput();
        } catch (QueryException $e) {
            return RedirectHelper::backWithInputFromException();
        }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
            $user = Slider::find($id);
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
    public function ajaxUpdateStatus(Request $request) {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $user = Slider::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }


}
