<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Qltv_Nganh; //Muốn sử dụng csdl thì phải use
use App\Qltv_Thuthu;
use App\Qltv_Khoa;
use Illuminate\Support\Facades\DB; 
use App\Http\Requests\ThuthuCreateRequest; 
use Illuminate\Support\Facades\Storage;

class ThuthuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Qltv_Thuthu::paginate(5);
        $users= DB::table('qltv_thuthu')->paginate(5); // Hiển thị Phân Trang
        return view('backend.thuthu.index',['users' => $users])
            ->with('listThuthu', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listNganh = Qltv_Nganh::all();
        $listKhoa = Qltv_Khoa::all();
        return view('backend.thuthu.create')
            ->with('listKhoa', $listKhoa)
            ->with('listNganh',$listNganh);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThuthuCreateRequest $request)
    {
        $thuthu = new Qltv_Thuthu();
        $thuthu->mathuthu = $request->mathuthu;
        $thuthu->tenthuthu = $request->tenthuthu;
        $thuthu->gioitinh = $request->gioitinh;
        $thuthu->namsinh = $request->namsinh;
        $thuthu->diachi = $request->diachi;
        $thuthu->sdt = $request->sdt;
        $thuthu->email = $request->email;
        $thuthu->quequan = $request->quequan;
        //Kiểm tra ảnh có rỗng không
        $thuthu->save();

        return redirect()->to('admin/thuthu');
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
        $thuthu = Qltv_Thuthu::find($id); //SELECT * from qltv_thuthu where id='id'
        $listNganh = Qltv_Nganh::all();
        $listKhoa = Qltv_Khoa::all();
        return view('backend.thuthu.edit')
            ->with('thuthu', $thuthu);
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
        $thuthu = Qltv_Thuthu::find($id);
        $thuthu->mathuthu = $request->mathuthu;
        $thuthu->tenthuthu = $request->tenthuthu;
        $thuthu->gioitinh = $request->gioitinh;
        $thuthu->namsinh = $request->namsinh;
        $thuthu->diachi = $request->diachi;
        $thuthu->sdt = $request->sdt;
        $thuthu->email = $request->email;
        $thuthu->quequan = $request->quequan;
        //Kiểm tra ảnh có rỗng không

        $thuthu->save();

        return redirect()->to('admin/thuthu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thuthu= Qltv_Thuthu::find($id);
        $thuthu->delete();

        return redirect()->to('admin/thuthu');
    }
    public function print()
    {
        $list = Qltv_Thuthu::all();
        return view('backend.thuthu.print')
            ->with('listThuthu', $list);
    }
}
