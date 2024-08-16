<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as user;
use Cookie;
use Session;
use Redirect;
use DB;
use App\khachhang as khachhang;
use App\chitietsach;
use App\sach as sach;
use App\loaisach as loaisach;
use App\nhaxuatban as nhaxuatban;
use Illuminate\Support\Facades\Validator;
use Auth;
class admincontroller extends Controller
{
    function getlogin(){
    	return View('admin.login');
    }
    function getkhachhang(){
        return View('admin.adduser');  
    }
    function postkhachhang(Request $req){
        $khachhang=new user ;
        $khachhang->name=$req->txtusername;
        $khachhang->email=$req->email;
        $khachhang->password=bcrypt($req->PassWord);
        $khachhang->quyen_tk=$req->quyen_tk;
        $khachhang->save();
        
        return View('admin.login')->with(['thongbao'=>'Tạo tài khoản thành công!']);
    }
    function getloaisach(){
        return View('admin.loaisach');
    }
    function postlogin(Request $request){
        
    	$username=$request->name;
   
    	$password=$request->password;

        
        $khachhang_login = user::where('name',$username)->get();
        
        $minutes = 30;
        $credentials = $request->only('name', 'password');
        
        if(\Auth::attempt($credentials)){
              Cookie::queue(Cookie::make('name',$username, $minutes));
   			return View('index.index');
    	}
    	elseif(count($khachhang_login)>0){
            if(\Hash::check($password,$khachhang_login->password)){
                Cookie::queue(Cookie::make('khachhang_login',$request->name, 60));
                return redirect('home');
            }

            else{
                Session::flash('message', "Vui lòng kiểm tra lại tài khoản mật khẩu!");
                return Redirect::back();   
            }
        }
        else{
             Session::flash('message', "Vui lòng kiểm tra lại tài khoản mật khẩu!");
                return Redirect::back(); 
        }
    
    }
    	
    function kh_logout(){
        Cookie::queue(Cookie::forget('khachhang_login'));
        return redirect('kh_login');
    }
   

}