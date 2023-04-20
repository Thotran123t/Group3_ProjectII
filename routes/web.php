<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MacBookController;
use App\Http\Controllers\Admin\AppWatchController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Frontend\CustomerInterfaceController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


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

//admin
Route::prefix('admin')->group(function(){
    Route::get('login', [HomeController::class,'login'])->name('login');
    Route::post('checklogin', [HomeController::class,'checklogin'])->name('checklogin');
    Route::post('createaccount', [UserController::class,'store'])->name('createaccount');

});
Route::prefix('admin')->middleware('checkUserRole')->group(function(){

    Route::Resource('/admin',UserController::class);

    Route::Resource('/customer',CustomerController::class);
    Route::Resource('/product',ProductController::class);
    Route::Resource('/macbook',MacBookController::class);
    Route::Resource('/appwatch',AppWatchController::class);

    Route::Resource('/category',CategoryController::class);
    Route::Resource('/image',ImageController::class);
    Route::Resource('/order',OrderController::class);

    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    Route::get('editprofile', [HomeController::class,'editprofile'])->name('editprofile');
    Route::get('logout', [HomeController::class,'logout'])->name('logout');

});

//frontend
Route::prefix('frontend')->group(function(){
    Route::get('home', [CustomerInterfaceController::class,'home'])->name('home');
    Route::get('shop', [CustomerInterfaceController::class,'shop'])->name('shop');
    Route::get('about', [CustomerInterfaceController::class,'about'])->name('about');
    Route::get('contact', [CustomerInterfaceController::class,'contact'])->name('contact');
    Route::get('cart', [CustomerInterfaceController::class,'cart'])->name('cart');
    Route::get('myaccount', [CustomerInterfaceController::class,'myaccount'])->name('myaccount');
    Route::get('profile', [CustomerInterfaceController::class,'profile'])->name('profile');


    Route::post('create_user', [CustomerInterfaceController::class,'create_user'])->name('create_user');
    Route::post('signin_user', [CustomerInterfaceController::class,'signin_user'])->name('signin_user');
    Route::get('signout_user', [CustomerInterfaceController::class,'signout_user'])->name('signout_user');
    Route::get('checkout', [CustomerInterfaceController::class,'checkout'])->name('checkout');

    ////////////////////////////////////
    Route::get('product_detail/{id}', [CustomerInterfaceController::class, 'product_detail'])->name('product_detail');
    Route::get('macbook_detail/{id}', [CustomerInterfaceController::class, 'macbook_detail'])->name('macbook_detail');

    Route::get('category_detail/{cateid}/{catename}', [CustomerInterfaceController::class, 'category_detail'])->name('category_detail');

    Route::post('add_to_cart', [CustomerInterfaceController::class,'add_to_cart'])->name('add_to_cart');
    Route::delete('remove_cart/{index}', [CustomerInterfaceController::class,'remove_cart'])->name('remove_cart');


    Route::get('delete_cart', [CustomerInterfaceController::class,'delete_cart'])->name('delete_cart');
    Route::get('view_cart', [CustomerInterfaceController::class,'view_cart'])->name('view_cart');

});
