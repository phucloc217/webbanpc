<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function Login(Request $request)
    {
        if(isset($_POST['login-btn']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::where('username','LIKE',$username)->first();
            $user->makeVisible('password');
            if($user!=null&&Hash::check($password,$user->password))
            {
                $user->makeHidden('password');
                Session::put('variableName', $user);   
                return redirect("/admin");
            }
            else
            {
               return redirect()->back()->withErrors(['msg' => 'Sai mật khẩu']); 
            }

        }
        else
        {
            return redirect()->back()->withErrors(['msg' => 'Sai tên đăng nhập']); 
        }
    }
}
