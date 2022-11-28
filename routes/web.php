<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
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
    Route::get('nguoidung/chinhsua/{id}', [UserController::class,'Update']);
    Route::get('nguoidung/xoa/{id}', [UserController::class,'Delete']);
    Route::post('nguoidung/chinhsua/{id}', [UserController::class,'Update']);
    Route::get('nguoidung/themnguoidung', function () {
        return view("AdminViews.themnguoidung");
    });

    Route::get('khachhang', [KhachHangController::class,'index']);
    Route::post('khachhang/them', [KhachHangController::class,'Insert']);
    Route::get('khachhang/them', function () {
        return view("AdminViews.themkhachhang");
    });
    Route::get('khachhang/chinhsua/{id}', [KhachHangController::class,'Update']);
    Route::post('khachhang/chinhsua/{id}', [KhachHangController::class,'Update']);
    Route::get('khachhang/xoa/{id}', [KhachHangController::class,'Delete']);

    Route::get('danhmuc', [DanhMucController::class,'index']);
    Route::post('danhmuc/themdanhmuc', [DanhMucController::class,'Insert']);
    Route::get('danhmuc/themdanhmuc', function () {
        return view("AdminViews.themdanhmuc");
    });

    Route::get('sanpham', [SanPhamController::class,'index']);
    Route::post('sanpham/them', [SanPhamController::class,'Insert']);
    Route::get('sanpham/them', [SanPhamController::class,"Insert"]);
    Route::get('sanpham/chinhsua/{id}', [SanPhamController::class,'Update']);
    Route::post('sanpham/chinhsua/{id}', [SanPhamController::class,'Update']);
    Route::get('sanpham/xoa/{id}', [SanPhamController::class,'Delete']);
});