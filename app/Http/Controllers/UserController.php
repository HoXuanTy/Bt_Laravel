<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;

class UserController extends Controller
{

    
    //
    public function Register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        $input['password'] = bcrypt($input['password']);
        User::create($input);

        echo '
        <script>
            alert ("Đăng ký thành công. Vui lòng đăng nhập.");
            window.location.assign("login");
        </script>
        ';
    }

    public function Login(Request $request)
    {
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('pw')
        ];
        if (Auth::attempt($login)) {
            $user = Auth::user();
            Session::put('user', $user);
            echo '<script>alert("Đăng nhập thành công.");window.location.assign("master");</script>';
        } else {
            echo '<script>alert("Đăng nhập thất bại.");window.location.assign("login");</script>';
        }
    }


    public function Logout()
    {
        Session::forget('user');
        Session::forget('cart');
        return redirect('/master');
    }
}
