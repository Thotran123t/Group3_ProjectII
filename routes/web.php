<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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


Route::prefix('admin')->group(function(){
    Route::post('checklogin', [UserController::class,'checklogin'])->name('checklogin');
    Route::get('login', [UserController::class,'index']);
    Route::Resource('admin',UserController::class);
});

// Route::prefix('admin')->middleware('checkUserRole')->group(function(){
//     Route::Resource('/category',CategoryController::class);
//     Route::Resource('/product',ProductController::class);
// });
