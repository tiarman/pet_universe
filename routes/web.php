<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('site.index');
})->name('home');

Route::get('/logout', [SiteController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');
  Route::get('/profile', [SiteController::class, 'profile'])->name('profile');

  # Ajax
  Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::post('/permission-by-role', [PermissionController::class, 'getPermissionByRole'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('get.permission.by.role');
    Route::post('/update/user/status', [UserController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.user.status');
    Route::post('/update/slider/status', [SliderController::class, 'ajaxUpdateStatus'])->name('update.slider.status');
    Route::post('/update/category/status', [CategoriesController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.category.status');


  });


  #Users
  Route::prefix('user')->name('user.')->group(function () {
    Route::get('/create', [UserController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
    Route::post('/store', [UserController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
    Route::get('/manage/{id}', [UserController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
    Route::get('/{id}/view', [UserController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
    Route::delete('/destroy', [UserController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
    Route::get('/list', [UserController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
  });

  #Roles
  Route::prefix('role')->name('role.')->group(function () {
    Route::get('/create', [RoleController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Role')->name('create');
    Route::post('/store', [RoleController::class, 'store'])->middleware('role_or_permission:Super Admin|Create Role|Manage Role')->name('store');
    Route::get('/manage/{id}', [RoleController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Role')->name('manage');
    Route::get('/{id}/view', [RoleController::class, 'view'])->middleware('role_or_permission:Super Admin|View Role')->name('view');
    Route::delete('/destroy', [RoleController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Role')->name('destroy');
    Route::get('/list', [RoleController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of Role')->name('list');
  });

  #Permission
  Route::match(['get', 'post'], '/permission/manage', [PermissionController::class, 'managePermission'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('permission.manage');




      #Slider
      Route::prefix('slider')->name('slider.')->group(function () {
        Route::get('/create', [SliderController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Slider')->name('create');
        Route::post('/store', [SliderController::class, 'store'])->middleware('role_or_permission:Super Admin|Store Slider')->name('store');
        Route::get('/manage/{id}', [SliderController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
        Route::get('/{id}/view', [SliderController::class, 'view'])->middleware('role_or_permission:Super Admin|View Slider')->name('view');
        Route::delete('/destroy', [SliderController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
        Route::get('/list', [SliderController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
    });

       #Categories
       Route::prefix('category')->name('category.')->group(function () {
        Route::get('/create', [CategoryController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [CategoryController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [CategoryController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [CategoryController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [CategoryController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #SubCategory
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/create', [SubCategoryController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [SubCategoryController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [SubCategoryController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [SubCategoryController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [SubCategoryController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [SubCategoryController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });




});
