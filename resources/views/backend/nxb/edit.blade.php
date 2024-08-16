@extends('backend.layouts.master')
@section('title')
Quản Trị - Hiệu Chỉnh Nhà Xuất Bản
@endsection
@section('feature-title')
Hiệu Chỉnh Nhà Xuất Bản
@endsection
@section('content')
<form name="frmEditNxb" method="post" action="{{ url('admin/nxb/update',['id'=>$nxb->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group" >
    <label for="manxb">Mã Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="manxb" name="manxb" aria-describedby="manxbHelp" placeholder="Nhập mã Nhà Xuất Bản . . ." value="{{ $nxb->manxb }}">
    
  </div>
  <div class="form-group" >
    <label for="tennxb">Tên Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="tennxb" name="tennxb" aria-describedby="tennxbHelp" placeholder="Nhập tên Nhà Xuất Bản . . ." value="{{ $nxb->tennxb}}">
   
  </div>
  <a href="{{ url('admin/nhaxuatban') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection