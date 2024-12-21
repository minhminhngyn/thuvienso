<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as user;
use Auth;
use Cookie;
use Session;
use Redirect;

class LoginController extends Controller
{

    function getlogin(){
    	return View('admin.login');
    }
    
    function postlogin(Request $request){
        
    	$username=$request->name;
   
    	$password=$request->password;

        
        $khachhang_login = user::where('name',$username)->get();
        
        $minutes = 30;
        $credentials = $request->only('name', 'password');
        if(\Auth::attempt($credentials)){
              Cookie::queue(Cookie::make('name',$username, $minutes));
              return redirect('admin/dashboard');
    	}
    	elseif(count($khachhang_login)>0){
            if(\Hash::check($password,$khachhang_login->password)){
                Cookie::queue(Cookie::make('khachhang_login',$request->name, 60));
            }

            else{
                Session::flash('message', "Vui lòng kiểm tra lại mật khẩu tài khoản!");
                return Redirect::back();   
            }
        }
        else{
             Session::flash('message', "Vui lòng kiểm tra lại mật khẩu tài khoản!");
                return Redirect::back(); 
        }
    
    }
   
    	
    function kh_logout(){
        Cookie::queue(Cookie::forget('khachhang_login'));
        return redirect('kh_login');
    }
}
