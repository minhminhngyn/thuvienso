<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Qltv_Nganh; //Muốn sử dụng csdl thì phải use
use Illuminate\Support\Facades\DB; 
use App\Http\Requests\NganhCreateRequest; 


class NganhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Qltv_Nganh::paginate(5);
        $users= DB::table('qltv_nganh')->paginate(5); // Hiển thị Phân Trang
        return view('backend.nganh.index',['users' => $users])
            ->with('listNganh', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nganh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NganhCreateRequest $request)
    {
        $nganh = new Qltv_Nganh();
        $nganh->manganh = $request->manganh;
        $nganh->tennganh = $request->tennganh;

        $nganh->save();

        return redirect()->route('admin/nganh');
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
        $nganh = Qltv_Nganh::find($id); //SELECT * from qltv_nganh where id='id'
        return view('backend.nganh.edit')
            ->with('nganh', $nganh);
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
        $nganh = Qltv_Nganh::find($id);
        $nganh->manganh = $request->manganh;
        $nganh->tennganh = $request->tennganh;

        $nganh->save();

        return redirect()->to('admin/nganh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nganh= Qltv_Nganh::find($id);
        $nganh->delete();

        return redirect()->to('admin/nganh');
    }
    public function print()
    {
        $list = Qltv_Nganh::all();
        return view('backend.nganh.print')
            ->with('listNganh', $list);
    }
}
