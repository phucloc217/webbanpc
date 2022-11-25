<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
    public function CreateUserID()
    {
        $data = User::select('id')->orderBy('id','DESC')->first();
        $id=(int)preg_replace("/[^0-9,.]/", "", $data->id);
        $id++;
        $id=str_pad($id, 8, '0', STR_PAD_LEFT);
        return "US".$id;
    }
    public function Login(Request $request)
    {
        if (isset($_POST['login-btn'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::where('username', 'LIKE', $username)->first();
            $user->makeVisible('password');
            if ($user != null && Hash::check($password, $user->password)) {
                $user->makeHidden('password');
                Session::put('user', $user);
                return redirect("/admin");
            } else {
                return redirect()->back()->withErrors(['msg' => 'Sai mật khẩu']);
            }

        } else {
            return redirect()->back()->withErrors(['msg' => 'Sai tên đăng nhập']);
        }
    }

    public function index()
    {
        $data = User::all();
        return view("AdminViews.nguoidung", compact('data'));
    }
    public function Insert()
    {
        if (isset($_POST['them'])) {
            if ($_POST['hoten'] == "") {
                return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Họ tên không được bỏ trống');
            } else if ($_POST['username'] == "") {
                return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Username không được bỏ trống');
            } else if (!isset($_POST['matkhau']) || $_POST['matkhau'] == "") {
                return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Mật khẩu không được bỏ trống');
            } else {
                $user = User::where("username", "LIKE", $_POST['username'])->get();
                if ($user->isNotEmpty()) {
                     return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Username đã tồn tại');
                } else {
                    $user = new User();
                    $user->id=$this->CreateUserID();
                    $user->tenuser = $_POST['hoten'];
                    $user->email = $_POST['email'];
                    $user->sdt = $_POST['sdt'];
                    $user->username = $_POST['username'];
                    $user->password = Hash::make($_POST['matkhau']);
                    $saved = $user->save();
                    if ($saved) {
                        return redirect("/admin/nguoidung/themnguoidung")->with('message', 'Thêm thành công');
                    } else {
                        return redirect("/admin/nguoidung/themnguoidung")->with('err-msg', 'Thêm không thành công');
                    }
                }
            }

        } else {
            return redirect()->back();
        }
    }
   
}