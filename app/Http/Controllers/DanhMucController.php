<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use \DB; 
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index()
    {
        $data = Danhmuc::leftJoin('sanpham','danhmuc.madanhmuc','=','sanpham.madanhmuc')->select('danhmuc.madanhmuc','tendanhmuc')->get();
        return view("AdminViews.danhmuc",compact('data'));
    }
    public function Insert()
    {
        if(isset($_POST['them']))
        {
            if($_POST['tendanhmuc']!="")
            {
                $danhmuc = new Danhmuc;
                $danhmuc->tendanhmuc = $_POST['tendanhmuc'];
                $saved = $danhmuc->save();
                if($saved)
                {
                    return redirect("/admin/danhmuc/themdanhmuc")->with('message', 'Thêm thành công');
                }
                else
                {
                    return redirect("/admin/danhmuc/themdanhmuc")->withErrors('message', 'Thêm không thành công');
                }
            }
            else
            return redirect("/admin/danhmuc/themdanhmuc")->withErrors('message', 'Tên danh mục không được bỏ trống');;
        }
        else{
            return redirect()->back();
        }

    }
    public function Update()
    {
            
    }
    public function Delete()
    {
            
    }
}
