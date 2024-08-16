@extends('backend.layouts.master')
@section('title')
Quản Trị - Đọc giả
@endsection
@section('feature-title')
Danh Sách Đọc giả
@endsection
@section('content')
<a href="{{ url('admin/docgia/create') }}" class="btn btn-primary">Thêm mới</a>
<a href="{{ url('admin/docgia/print') }}" class="btn btn-success">In Danh Sách</a>
<table class="table table-bordered table-hover table-responsive">
    <thead>
        <tr class="table-success" >
            <th colspan="2">Chức Năng</th>
            <th>Mã Đọc giả</th>
            <th>Tên Đọc giả</th>
            <th>Ảnh</th>
            <th>Khoa</th>
            <th>Ngành</th>   
            <th>Chức Vụ</th>
            <th>Giới Tính</th>
            <th>Năm Sinh</th>
            <th>Địa Chỉ</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Quê Quán</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listDocgia as $docgia)
        <tr>
            <td>
                <a class="btn btn-primary" href="{{ url('admin/docgia/edit', ['id'=>$docgia->id]) }}"><i class="far fa-edit"></i></a>
                
            </td>
            <td>
                <form name="frmDeleteDocgia" id="frmDeleteDocgia" method="post" action="{{ url('admin/docgia', ['id' => $docgia->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button class="btn btn-danger btn-icon-split btn-delete">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                    </button>
                </form>
            </td>
            <td>{{$docgia->madocgia}}</td>
            <td>{{$docgia->tendocgia}}</td>
            <td>
                <img src="{{ asset('storage/uploads/'. $docgia->anh) }}" width="80px" height="80px"/>
            </td>
            <td>{{$docgia->khoa->tenkhoa}}</td>
            <td>{{$docgia->nganh->tennganh}}</td>
            <td>{{$docgia->chucvu}}</td>
            <td>{{$docgia->gioitinh}}</td>
            <td>{{$docgia->namsinh}}</td>
            <td>{{$docgia->diachi}}</td>
            <td>{{$docgia->sdt}}</td>
            <td>{{$docgia->email}}</td>
            <td>{{$docgia->quequan}}</td>
        </tr>
        @endforeach
    <tbody>
</table>

{{ $users->links() }}
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function(){
        $('.btn-delete').click(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Bạn Có Chắc Xóa Không?',
                text: "Nếu bạn xóa thì dữ liệu này sẽ không phục hồi được!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Xóa Dữ liệu!',
                    'Dữ liệu của bạn đã được xóa',
                    'Thành Công'
                    )

                    //submit form
                    $(this).parent('#frmDeleteDocgia').submit();
                }
                })
        })
    })
</script>
@endsection