<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Qltv_Sach;
use App\Qltv_Nxb;
use App\Qltv_Theloai;
use App\Http\Requests\SachCreateRequest;
use Illuminate\Support\Facades\Storage;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Qltv_Sach::paginate(5); // Phân trang cho dữ liệu
        $users= DB::table('qltv_sach')->paginate(5); // Hiển thị Phân Trang
        return view('backend.sach.index',['users' => $users])
            ->with('listSach', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listTheloai = Qltv_Theloai::all();
        $listNxb = Qltv_Nxb::all();
        return view('backend.sach.create')
            ->with('listTheloai', $listTheloai)
            ->with('listNxb', $listNxb);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SachCreateRequest $request)
    {
        $sach = new Qltv_Sach();
        $sach->masach      = $request->masach;
        $sach->tensach      = $request->tensach;
        $sach->tentacgia      = $request->tentacgia;
        $sach->soluong       = $request->soluong;
        if($request->has('trangthaisach')) {
            $sach->trangthaisach = 1; // Còn Sách
        } else {
            $sach->trangthaisach = 2; // Hết Sách
        }
        //Kiểm tra ảnh có rỗng không
        if(!empty($request->anh)){
            $sach->anh = $request->anh;
        }
        $sach->theloai_id       = $request->theloai_id;
        $sach->nxb_id       = $request->nxb_id;
        if($request->hasFile('anh'))
        {
            $file = $request->anh;
            // Lưu tên hình vào column image
            $sach->anh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "uploads"
            $fileSaved = $file->storeAs('storage/uploads', $sach->anh);
        }
        $sach->save();
        return redirect()->to('admin/sach');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sach = Qltv_Sach::find($id);
        $listTheloai = Qltv_Theloai::all();
        $listNxb = Qltv_Nxb::all();
        return view('backend.sach.edit')
            ->with('listTheloai', $listTheloai)
            ->with('listNxb', $listNxb)
            ->with('sach', $sach);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sach = Qltv_Sach::find($id);
        $sach->masach      = $request->masach;
        $sach->tensach      = $request->tensach;
        $sach->tentacgia      = $request->tentacgia;
        $sach->soluong       = $request->soluong;
        if($request->has('trangthaisach')) {
            $sach->trangthaisach = 1; // Còn Sách
        } else {
            $sach->trangthaisach = 2; // Hết Sách
        }
        //Kiểm tra ảnh có rỗng không
        if(!empty($request->anh)){
            $sach->anh = $request->anh;
        }
        $sach->theloai_id       = $request->theloai_id;
        $sach->nxb_id       = $request->nxb_id;
        if($request->hasFile('anh'))
        {
            // Storage::delete('storage/uploads/' . $sach->anh);
            // $image = $request->('anh');
            // $new_name = $image->getClientOriginalName();
            // $image->move('storage/uploads', $new_name);
            //Xóa ảnh cũ để tránh rác
            Storage::delete('storage/uploads/' . $sach->anh);
            $file = $request->anh;
            // Lưu tên hình vào column image
            $sach->anh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "uploads"
            $fileSaved = $file->move('storage/uploads', $sach->anh);
        }

        
        $sach->save();
        return redirect()->to('admin/sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach= Qltv_Sach::find($id);
        $sach->delete();

        return redirect()->to('admin/sach');
    }
    public function print()
    {
        $list = Qltv_Sach::all();
        return view('backend.sach.print')
            ->with('listSach', $list);
    }
}
