@extends('backend.layouts.master')
@section('title')
Quản Trị - Hiệu Chỉnh Thể Loại Sách
@endsection
@section('feature-title')
Hiệu Chỉnh Thể Loại Sách
@endsection
@section('content')
<form name="frmEditTheloai" method="post" action="{{ url('admin/theloai/update',['id'=>$theloai->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="matheloai">Mã Thể Loại Sách</label>
    <input type="text" class="form-control" id="matheloai" name="matheloai" aria-describedby="matheloaiHelp" value="{{ $theloai->matheloai }}" readonly>
  </div>
  <div class="form-group">
    <label for="tentheloai">Tên Thể Loại Sách</label>
    <input type="text" class="form-control" id="tentheloai" name="tentheloai" aria-describedby="tentheloaiHelp" placeholder="Nhập tên thể loại sách . . ." value="{{ $theloai->tentheloai }}">
  </div>
  <a href="{{ url('admin/theloai/index') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
  // Hàm tạo mã thể loại tự động từ tên thể loại
  function generateMaTheloai() {
    // Lấy tên thể loại từ input
    const tentheloai = document.getElementById('tentheloai').value.trim();

    // Lấy phần "group" từ các chữ cái đầu của các từ trong tên thể loại
    const group = tentheloai.split(' ')  // Tách tên thể loại thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Tạo mã thể loại theo định dạng TL_<group>
    const matheloai = `TL_${group}`;

    // Cập nhật giá trị mã thể loại vào trường input
    document.getElementById('matheloai').value = matheloai;
  }

  // Lắng nghe sự kiện khi người dùng nhập tên thể loại
  document.getElementById('tentheloai').addEventListener('input', generateMaTheloai);

  // Gọi hàm để tạo mã thể loại ban đầu nếu tên thể loại đã có giá trị
  generateMaTheloai();
</script>
@endsection
