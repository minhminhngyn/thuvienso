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
  <div class="form-group">
    <label for="manxb">Mã Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="manxb" name="manxb" aria-describedby="manxbHelp" value="{{ $nxb->manxb }}" readonly>
  </div>
  <div class="form-group">
    <label for="tennxb">Tên Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="tennxb" name="tennxb" aria-describedby="tennxbHelp" placeholder="Nhập tên Nhà Xuất Bản . . ." value="{{ $nxb->tennxb }}">
  </div>
  <a href="{{ url('admin/nhaxuatban') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
  // Hàm tạo mã nhà xuất bản tự động từ tên nhà xuất bản
  function generateMaNxb() {
    // Lấy tên nhà xuất bản từ input
    const tennxb = document.getElementById('tennxb').value.trim();

    // Lấy phần "group" từ các chữ cái đầu của các từ trong tên nhà xuất bản
    const group = tennxb.split(' ')  // Tách tên nhà xuất bản thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Tạo mã nhà xuất bản theo định dạng NXB_<group>
    const manxb = `NXB_${group}`;

    // Cập nhật giá trị mã nhà xuất bản vào trường input
    document.getElementById('manxb').value = manxb;
  }

  // Lắng nghe sự kiện khi người dùng nhập tên nhà xuất bản
  document.getElementById('tennxb').addEventListener('input', generateMaNxb);

  // Gọi hàm để tạo mã nhà xuất bản ban đầu nếu tên nhà xuất bản đã có giá trị
  generateMaNxb();
</script>
@endsection
