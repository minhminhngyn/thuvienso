@extends('backend.layouts.master')
@section('title')
Quản Trị - Thêm Mới Thể Loại Sách
@endsection
@section('feature-title')
Thêm Mới Thể Loại Sách
@endsection
@section('content')
<!-- DIV hiển thị thông báo lỗi start -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!-- DIV hiển thị thông báo lỗi end -->
<form name="frmCreateTheloai" id="frmCreateTheloai" method="post" action="{{ url('admin/theloai/store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group" >
    <label for="matheloai">Mã Thể Loại Sách</label>
    <input type="text" class="form-control" id="matheloai" name="matheloai" aria-describedby="matheloaiHelp" readonly>
    
  </div>
  <div class="form-group" >
    <label for="tentheloai">Tên Thể Loại Sách</label>
    <input type="text" class="form-control" id="tentheloai" name="tentheloai" aria-describedby="tentheloaiHelp" placeholder="Nhập tên Thể Loại Sách . . .">
    
  </div>
  <a href="{{ url('admin/theloaisach') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('custom-scripts')
<script>
// Kiểm tra xem trong localStorage đã có giá trị đếm chưa, nếu chưa thì gán giá trị mặc định là 1
// Kiểm tra xem trong localStorage đã có giá trị đếm chưa, nếu chưa thì gán giá trị mặc định là 1
if (!localStorage.getItem('currentCount')) {
    localStorage.setItem('currentCount', 1); // Khởi tạo nếu chưa có
}

// Hàm tạo mã thể loại theo định dạng TL_<group> (chỉ còn group mà không có id)
function generateMatheloai() {
    // Lấy tên thể loại từ input
    const tentheloai = $('#tentheloai').val().trim();

    // Tạo phần group từ các chữ cái đầu của mỗi từ trong tên thể loại
    const group = tentheloai.split(' ')  // Tách tên thể loại thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Tạo mã thể loại theo định dạng TL_<group> (chỉ có group)
    const matheloai = `TL_${group}`;

    // Trả về mã thể loại để có thể sử dụng ngoài hàm
    return matheloai;
}

// Cập nhật mã thể loại ban đầu vào trường input
$('#matheloai').val(generateMatheloai());  // Mã thể loại sẽ có cấu trúc TL_<group>

// Khi người dùng nhập tên thể loại
$('#tentheloai').on('input', function() {
    const matheloai = generateMatheloai();  // Tạo mã thể loại với group
    $('#matheloai').val(matheloai);         // Cập nhật mã thể loại vào trường input
});

// Khi nhấn nút lưu, thêm phần group vào mã thể loại và lưu lại
$('#saveButton').click(function() {
    const tentheloai = $('#tentheloai').val().trim(); // Lấy tên thể loại từ input

    // Tạo phần group từ các chữ cái đầu của mỗi từ trong tên thể loại
    const group = tentheloai.split(' ')  // Tách tên thể loại thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Lấy mã thể loại đã được tạo với group
    let matheloai = `TL_${group}`;

    // Cập nhật mã thể loại vào trường input
    $('#matheloai').val(matheloai);

    // Lưu thông tin thể loại vào localStorage hoặc xử lý tiếp theo
    localStorage.setItem('theLoai_' + matheloai, tentheloai);  // Lưu tên thể loại theo mã thể loại
});


  $(document).ready(function() {
    $("#frmCreateTheloai").validate({
      rules: {
        matheloai: {
          required: true,
          minlength: 3,
          maxlength: 20
        },
        tentheloai: {
          required: true,
          minlength: 3,
          maxlength: 500
        },
      },
      messages: {
        tentheloai: {
          required: "Vui lòng nhập tên thể loại sách",
          minlength: "Tên thể loại sách phải có ít nhất 3 ký tự",
          maxlength: "Tên thể loại sách không được vượt quá 500 ký tự"
        },
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        // Thêm class `invalid-feedback` cho field đang có lỗi
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element);
        }
        // Thêm icon "Kiểm tra không Hợp lệ"
        if (!element.next("span")[0]) {
          $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
            .insertAfter(element);
        }
      },
      success: function(label, element) {
        // Thêm icon "Kiểm tra Hợp lệ"
        if (!$(element).next("span")[0]) {
          $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
            .insertAfter($(element));
        }
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
  });
</script>
@endsection