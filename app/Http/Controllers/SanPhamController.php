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
        return view("AdminViews.sanpham", compact('data'));
    }
    public function Insert(Request $request)
    {
        if (isset($_POST['them'])) {
            if (!isset($_POST['tensp']) || empty($_POST['tensp'])) {
                return redirect("/admin/sanpham/them")->with('err-msg', 'Tên sản phẩm không được bỏ trống');
            } else if (!isset($_POST['gia']) || empty($_POST['gia'])) {
                return redirect("/admin/sanpham/them")->with('err-msg', 'Giá sản phẩm không được bỏ trống');
            } else {
                $sanpham = new Sanpham;
                $sanpham->tensp = $_POST['tensp'];
                $sanpham->cpu = $_POST['cpu'];
                $sanpham->ram = $_POST['ram'];
                $sanpham->card = $_POST['card'];
                $sanpham->ocung = $_POST['ocung'];
                $sanpham->cam = $_POST['camera'];
                $sanpham->manhinh = $_POST['manhinh'];
                $sanpham->gia = (int) $_POST['tensp'];
                $sanpham->madanhmuc = $_POST['danhmuc'];
                $sanpham->mota = $_POST['mota'];
                if ($request->hasFile('img')) {
                    $sanpham->anh = basename($request->file('img')->store('public/product-img', 'local'));
                } else {
                    $sanpham->anh = "default.jpg";
                }

                $saved = $sanpham->save();
                if ($saved) {
                    return redirect("/admin/sanpham/them")->with('message', 'Thêm thành công');
                } else {
                    return redirect("/admin/sanpham/them")->with('err-msg', 'Thêm không thành công');
                }
            }
        } else {
            $data = Danhmuc::all();
            return view("AdminViews.themsanpham", compact("data"));
        }
    }
    public function Delete($id)
    {
        $sanpham = Sanpham::where("masp", "=", $id)->first();
        if ($sanpham != null) {
            if ($sanpham->anh != "default.jpg")
                unlink(storage_path('app/public/product-img/' . $sanpham->anh));
            $sanpham->delete();
            return redirect("admin/sanpham")->with('message', 'Xóa thành công');
        }
        return redirect()->back();
    }
}