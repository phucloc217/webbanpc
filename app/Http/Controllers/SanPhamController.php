<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $data = Sanpham::all();
        return view("AdminViews.sanpham",compact('data'));
    }
    public function Insert()
    {
        if (isset($_POST['them'])) {
            // if ($_POST['hoten'] == "") {
            //     return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Họ tên không được bỏ trống');
            // } else if ($_POST['username'] == "") {
            //     return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Username không được bỏ trống');
            // } else if (!isset($_POST['matkhau']) || $_POST['matkhau'] == "") {
            //     return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Mật khẩu không được bỏ trống');
            // } else {
            //     $user = User::where("username", "LIKE", $_POST['username'])->get();
            //     if ($user->isNotEmpty()) {
            //          return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Username đã tồn tại');
            //     } else {
            //         $user = new User();
            //         $user->id=$this->CreateUserID();
            //         $user->tenuser = $_POST['hoten'];
            //         $user->email = $_POST['email'];
            //         $user->sdt = $_POST['sdt'];
            //         $user->username = $_POST['username'];
            //         $user->password = Hash::make($_POST['matkhau']);
            //         $saved = $user->save();
            //         if ($saved) {
            //             return redirect("/admin/nguoidung/themnguoidung")->with('message', 'Thêm thành công');
            //         } else {
            //             return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Thêm không thành công');
            //         }
            //     }
            // }

        } else {
            $data = Danhmuc::all();
            return view("AdminViews.themsanpham",compact("data"));
        }
    }
}
