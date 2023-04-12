<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
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


Route::prefix('admin')->group(function(){
    Route::get('login', [HomeController::class,'login'])->name('login');
    Route::post('checklogin', [HomeController::class,'checklogin'])->name('checklogin');
    Route::post('createaccount', [UserController::class,'store'])->name('createaccount');

});

Route::prefix('admin')->middleware('checkUserRole')->group(function(){
    Route::Resource('/category',CategoryController::class);
    Route::Resource('/product',ProductController::class);
    Route::Resource('/admin',UserController::class);

    Route::get('dashboard', [HomeController::class,'dashboard'])->name('dashboard');
    Route::get('editprofile', [HomeController::class,'editprofile'])->name('editprofile');
    Route::get('logout', [HomeController::class,'logout'])->name('logout');

});
