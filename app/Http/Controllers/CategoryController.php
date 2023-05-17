<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index(){
        $data['data'] = Category::orderby('created_at', 'desc')->paginate(20);
        return view('admin.category.list', $data);
    }
    public function manage($id = null) {
        if ($data['category'] = Category::find($id)) {
          return view('admin.category.manage', $data);
        }
        return RedirectHelper::routeWarning('category.list', '<strong>Sorry!!!</strong> User not found');
      }

    public function create($id = null){
        return view('admin.category.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Category successfully';
        $rules = [
            'category_name' => 'required|string',
            'category_slug' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Category::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Category::$statusArrays)],
        ];

        if ($request->has('id')) {
            $category = Category::find($request->id);
            $message = $message . ' updated';
          } else {
            $category = new Category();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $category->category_name = $request->category_name;
            $category->category_slug = $request->category_slug;
            $category->status = $request->status;

            if ($category->save()) {
                return RedirectHelper::routeSuccess('category.list', $message);
              }
            return RedirectHelper::backWithInput();

          }catch(QueryException $e){
            // return $e;
            return RedirectHelper::backWithInputFromException();

          }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
          $user = Category::find($id);
          if ($user->delete()) {
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
      $user = Category::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }


//   get child category
public function getChildCategory($id){
$data = DB::table('child_categories')->where('subcategory_id', $id)->get();
// return $data;
return response()->json($data);
}



}
