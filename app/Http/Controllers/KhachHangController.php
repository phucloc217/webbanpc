<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class KhachHangController extends Controller
{
    public function index()
    {
        $data = Khachhang::all();
        return view("AdminViews.khachhang",compact('data'));
    }
    public function CreateCustomerID()
    {
        $data = Khachhang::select('makh')->orderBy('makh','DESC')->first();
        $id=(int)preg_replace("/[^0-9,.]/", "", $data->makh);
        $id++;
        $id=str_pad($id, 8, '0', STR_PAD_LEFT);
        return "KH".$id;
    }
    public function Insert()
    {
        if (isset($_POST['them'])) {
            if (!isset($_POST['hoten'])||$_POST['hoten'] == "") {
                return redirect("/admin/khachhang/them")->with('err-msg', 'Họ tên không được bỏ trống');
            } else if (!isset($_POST['sdt'])||$_POST['sdt'] == "") {
                return redirect("/admin/khachhang/them")->with('err-msg', 'Số điện thoại không được bỏ trống');
            }else {
                $customer = Khachhang::where("sdt", "LIKE", $_POST['sdt'])->get();
                if ($customer->isNotEmpty()) {
                     return redirect("/admin/khachhang/them")->with('err-msg', 'Số điện thoại đã tồn tại');
                } else {
                    $customer = new Khachhang();
                    $customer->makh=$this->CreateCustomerID();
                    $customer->tenkh = $_POST['hoten'];
                    $customer->sdt = $_POST['sdt'];
                    $customer->diachi = $_POST['diachi'];
                    $customer->matkhau = Hash::make($_POST['sdt']);
                    $saved = $customer->save();
                    if ($saved) {
                        return redirect("/admin/khachhang/them")->with('message', 'Thêm thành công');
                    } else {
                        return redirect("/admin/khachhang/them")->with('err-msg', 'Thêm không thành công');
                    }
                }
            }

        } else {
            return redirect()->back();
        }
    }
    public function Update($id)
    {
        if (isset($_POST['luu'])) {
            if (!isset($_POST['hoten'])||$_POST['hoten'] == "") {
                return redirect("/admin/khachhang/chinhsua/$id")->with('err-msg', 'Họ tên không được bỏ trống');
            } else {
                $user = Khachhang::where("makh", "LIKE", $id)->first();
                if ($user != null) {
                    $user->tenkh = $_POST['hoten'];
                    $user->diachi = $_POST['diachi'];
                    $saved = $user->save();
                    if ($saved) {
                        return redirect("/admin/khachhang/chinhsua/$id")->with('message', 'Cập nhật thành công');
                    } else {
                        return redirect("/admin/khachhang/chinhsua/$id")->with('err-msg', 'Cập nhật không thành công');
                    }
                } else {
                    return redirect("/admin/khachhang/chinhsua/$id")->with('err-msg', 'User không tồn tại');
                }
            }

        } else {
            $data = Khachhang::where("makh", "LIKE", $id)->get();
            if ($data->isNotEmpty()) {
                return view("AdminViews.suakhachhang",compact("data"));
            }
            return redirect()->back();
        }
    }
    public function Delete($id)
    {
        $user = Khachhang::find($id);
        if($user!=null)
        {
            $user->delete();
            return redirect("admin/khachhang")->with('message', 'Xóa thành công');
        }
         return redirect()->back();
    }
}
