<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session; // ✅ Đúng rồi


class AuthController extends Controller
{ 
    public function Authenlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
           return Redirect::to('dashboard');

        }else{
            return Redirect::to('register')->send();
        }
    }
    public function showLoginForm()
    {
       
        return view('auth.login');
    }

    public function login(Request $request)
    {
         $this->Authenlogin(); 
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function dashboard()
    {
        
        return view('admin.dashboard');
    }

    public function dashboard_admin(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->first();

        if ($result && Hash::check($admin_password, $result->admin_password)) {
            // Đúng mật khẩu, tiếp tục xử lý hoặc chuyển hướng
         return view('admin.dashboard');
        } else {
            Session::put('message','Mật khẩu hoặc tài khoản sai nhập lại');
     
        return view('auth.login');

        }
    }

   

}
