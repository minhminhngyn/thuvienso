@extends('backend.layouts.master')
@section('title')
Quản Trị - Nhà Xuất Bản
@endsection
@section('feature-title')
Danh Sách Nhà Xuất Bản
@endsection
@section('content')
<a class="btn btn-primary" href="{{ url('admin/nxb/create') }}" >Thêm Mới</a>
<a href="{{ url('admin/nxb/print') }}" class="btn btn-success">In danh sách</a>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="table-success" style="text-align: center;">
            <th>Mã Nhà Xuất Bản</th>
            <th>Tên Nhà Xuất Bản</th>
            <th colspan="3" >Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listNxb as $nxb)
        <tr>
            <td>{{$nxb->manxb}}</td>
            <td>{{$nxb->tennxb}}</td>
            <td>
                <a class="btn btn-primary" href="{{ url('admin/nxb/edit', ['id'=>$nxb->id]) }}"><i class="far fa-edit"></i></a>
                
            </td>
            <td>
                <form name="frmDeleteNxb" id="frmDeleteNxb" method="post" action="{{ url('admin/nxb', ['id' => $nxb->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE"/>
                    <button class="btn btn-danger btn-icon-split btn-delete">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                    </button>
                </form>
            </td>
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
                    $(this).parent('#frmDeleteNxb').submit();
                }
                })
        })
    })
</script>
@endsection
