<?php

use App\Http\Controllers\DanhMucController;
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
    return view('welcome');
});

Route::get('/admin', function () {
    return view("AdminViews.index");
});
Route::prefix('admin')->group(function () {
    Route::post('login',[UserController::class,'login']);
    Route::get('login', function () {
        return view("AdminViews.login");
    });


    
    Route::get('nguoidung', [UserController::class,'index']);
    Route::post('nguoidung/themnguoidung', [UserController::class,'Insert']);
    Route::get('nguoidung/themnguoidung', function () {
        return view("AdminViews.themnguoidung");
    });



    Route::get('danhmuc', [DanhMucController::class,'index']);
    Route::post('danhmuc/themdanhmuc', [DanhMucController::class,'Insert']);
    Route::get('danhmuc/themdanhmuc', function () {
        return view("AdminViews.themdanhmuc");
    });
});