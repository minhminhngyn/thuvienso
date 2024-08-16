<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide as slides;
use DB;
use App\khachhang as khachhang;
use App\chitietsach;
use App\danhmuc as danhmuc;
use App\Qltv_Theloai as theloai;
use App\Qltv_Nxb as nhaxuatban;
use App\Qltv_Sach as qlsach;
use App\loaisach as loaisach;
use App\sach as sach;
use Session;
use Illuminate\Support\Facades\Validator;

class homecontroller extends Controller
{
    function gethome(){
    	$sl=DB::table('quangcao')->where('maloaiquangcao', '=', 1)->get();
        $danhmuc=danhmuc::all();
        $ls=loaisach::all();
        $theloai = theloai::paginate(12);
        $nxb=nhaxuatban::all();
        $sach = qlsach::all();
        $sach_name = theloai::with('sach')->get();
    	return View('page.home',compact('sl','ls','danhmuc','theloai','nxb','sach','sach_name'));
    }
    function addusers(){
    	return View('admin.adduser');
    }
    function getsachkinhte(Request $req){
        $id=$req->id;
        $danhmuc_id=theloai::find($id);
   
        $sach_danhmuc_id=qlsach::where('theloai_id',$danhmuc_id->id)->get();
        $error = "";
        if(count( $sach_danhmuc_id)>0){
    
        }
        else{
            $error="Danh mục sản phẩm này chưa được bày bán trên website.Vui lòng chọn sản phẩm khác!";
            return View('page.danhmucsanpham.danhmucsach',compact('id','danhmuc_id','sach_danhmuc_id','error'));
        }
    	return View('page.danhmucsanpham.danhmucsach',compact('id','danhmuc_id','sach_danhmuc_id','error'));
    }

    function chitietsanpham(Request $request)
    {   $id=$request->id;
        $nxb=nhaxuatban::all();
        $sach=qlsach::find($id);
        $nxbs=qlsach::find($sach->nxb_id);
        $theloai = theloai::paginate(12);
        $chitietsanpham=chitietsach::where('masach',$id)->get();
        return View('page.sanpham.ctsanpham',compact('nxb','sach','nxbs','chitietsanpham','theloai'));
    }

    function timkiem(Request $req){
      if(request('query')){
         $querys=request('query');
         $data=DB::table('sach')->where('tensach','LIKE','%'.$querys)->orWhere('tensach','LIKE',$querys.'%')->get();
         $output='<ul style="display:block;position:relative;background:white;z-index:1000;list-style-type: none;width:394px;">';
         foreach ($data as $row) {
            $output.="<a href=\"sanpham/$row->id\"><li><img src=\"http://localhost:8080/laravel/sachhay/public/image/anhsanpham/$row->anhbia\" style=\"width:50px;height:70px\">&nbsp;&nbsp;$row->tensach</li></a>";
        }
         $output.='</ul>';
         return response()->json([
        'success'   =>   $output
         ]);
      }
       
    }
    function timkiem_key(Request $req){
        $key=$req->key;
        $error = "";
        $sach=qlsach::where('tensach','LIKE','%'.$key.'%')->get();
        $theloai = theloai::paginate(12);
        $nxb=nhaxuatban::all();
        if(count($sach)==0){ 
            $error="Không Tìm Thấy Sản Phẩm Nào Với Từ Khóa: \" $key \".Vui Lòng Tìm Kiếm Sản Phẩm Khác!";
            return view('page.sanpham.timkiem',compact('key','sach','theloai','error','nxb'));
        }
        else{   
            return view('page.sanpham.timkiem',compact('key','sach','theloai','error','nxb'));
       }
    }

}