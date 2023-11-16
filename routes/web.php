<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttributeValueController;
use App\Http\Controllers\Backend\BackendDashboardController;
use App\Http\Controllers\Backend\BackendRoleController;
use App\Http\Controllers\Backend\BackendUsersController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('loginPost');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('registerPost');
});
Route::get('logout', [LogoutController::class, 'index'])->middleware('auth')->name('logout');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('users', BackendUsersController::class);
    Route::resource('roles', BackendRoleController::class);

    //Category routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index_category')->name('category.index');
        Route::post('category/store', 'store_category')->name('category.store');
        Route::get('sub-category', 'index_subcategory')->name('sub-category.index');
        Route::post('sub-category/store', 'store_subcategory')->name('sub-category.store');
        Route::delete('category/delete/{category}', 'destroy_category')->name('category.destroy');
        Route::get('edit/{id},' ,'edit_category')->name('edit.category');
        Route::post('update/{id}', 'update_category')->name('update.category');
        //Json responses
        Route::get('/get-sub-categories', 'get_sub_categories')->name('get-sub-categories');
    });

    Route::controller(ColorController::class)->group(function () {
        Route::get('color', 'index_color')->name('color.index');
        Route::post('color/store', 'store_color')->name('color.store');
        Route::get('color/edit/{id},' ,'edit_color')->name('edit.color');
        Route::post('color/update/{id}', 'update_color')->name('update.color');
        Route::delete('color/delete/{id}', 'destroy_color')->name('color.destroy');
    });

    Route::name('attribute.')->controller(AttributeController::class)->group(function (){
        Route::get('attributes', 'index')->name('index');
        Route::post('attributes/store', 'store')->name('store');
        Route::get('attributes/edit/{id}', 'edit')->name('edit');
        Route::post('attributes/update/{id}', 'update')->name('update');
        Route::delete('attribute/delete/{attribute}', 'delete')->name('delete');
    });

    Route::name('attribute.value.')->controller(AttributeValueController::class)->group(function () {
       Route::get('attribute/value/{attribute}', 'index')->name('index');
       Route::get('attribute/value/edit/{id}', 'edit')->name('edit');
       Route::post('attribute/value/store/{id}', 'store')->name('store');
       Route::delete('attribute/value/destroy/{attribute_value}', 'destroy')->name('delete');
       Route::get('get-attribute-values/{attributeId}', 'get_attribute_values')->name('get-attribute-values');
    });


    Route::name('products.')->controller(ProductController::class)->prefix('products')->group(function (){

        Route::get('list', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('create/store', 'store')->name('store');
        Route::get('edit/{product}', 'edit')->name('edit');

        Route::post('/check-slug-unique', 'checkSlugUnique')->name('unique-slug');
    });

    Route::resource('orders', OrdersController::class);



});

Route::controller(FileUploadController::class)->prefix('file')->group(function (){

    Route::post('thumbnail/upload' , 'thumbnailUpload' )->name('upload.thumbnail');
    Route::delete('thumbnail/delete', 'thumbnailRevert')->name('delete.thumbnail');
    Route::get('thumbnail/restore', 'thumbnailRestore')->name('restore.thumbnail');
    Route::post('product-image/upload', 'productImageUpload' )->name('upload.product-image');
    Route::delete('product-image/delete', 'productImageRevert')->name('delete.product-image');
    Route::get('product-image/restore', 'productImageRestore')->name('restore.product-image');
});
