@extends('backend.layouts.master')
@section('title')
Quản Trị - Thêm Mới Nhà Xuất Bản
@endsection
@section('feature-title')
Thêm Mới Nhà Xuất Bản
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
<form name="frmCreateNxb" id="frmCreateNxb" method="post" action="{{ url('admin/nxb/store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group" >
    <label for="manxb">Mã Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="manxb" name="manxb" aria-describedby="manxbHelp"readonly>
    
  </div>
  <div class="form-group" >
    <label for="tennxb">Tên Nhà Xuất Bản</label>
    <input type="text" class="form-control" id="tennxb" name="tennxb" aria-describedby="tennxbHelp" placeholder="Nhập tên Nhà Xuất Bản . . .">
    
  </div>
  <a href="{{ url('admin/nhaxuatban') }}" class="btn btn-primary">Quay về</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@section('custom-scripts')
<script>
// Kiểm tra xem trong localStorage đã có giá trị đếm chưa, nếu chưa thì gán giá trị mặc định là 1
if (!localStorage.getItem('currentCount')) {
    localStorage.setItem('currentCount', 1); // Khởi tạo nếu chưa có
}

// Hàm tạo mã nhà xuất bản theo định dạng NXB_<group> (chỉ có group, không có id)
function generateMaNXB() {
    // Lấy tên nhà xuất bản từ input (bỏ qua "Nhà xuất bản")
    const tennxb = $('#tennxb').val().trim();

    // Lấy phần "group" từ các từ còn lại sau "Nhà xuất bản"
    const group = tennxb.replace('Nhà xuất bản', '')  // Loại bỏ "Nhà xuất bản" khỏi tên
        .trim()  // Loại bỏ khoảng trắng đầu và cuối
        .split(' ')  // Tách tên thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Tạo mã nhà xuất bản theo định dạng NXB_<group> (chỉ có group)
    const manxb = `NXB_${group}`;

    // Trả về mã nhà xuất bản để có thể sử dụng ngoài hàm
    return manxb;
}

// Cập nhật mã nhà xuất bản ban đầu vào trường input
$('#manxb').val(generateMaNXB());  // Mã nhà xuất bản sẽ có cấu trúc NXB_<group>

// Khi người dùng nhập tên nhà xuất bản
$('#tennxb').on('input', function() {
    const manxb = generateMaNXB();  // Tạo mã nhà xuất bản với group
    $('#manxb').val(manxb);         // Cập nhật mã nhà xuất bản vào trường input
});

// Khi nhấn nút lưu, thêm phần group vào mã nhà xuất bản và lưu lại
$('#saveButton').click(function() {
    const tennxb = $('#tennxb').val().trim(); // Lấy tên nhà xuất bản từ input

    // Tạo phần group từ các chữ cái đầu của các từ còn lại sau "Nhà xuất bản"
    const group = tennxb.replace('Nhà xuất bản', '')  // Loại bỏ "Nhà xuất bản" khỏi tên
        .trim()  // Loại bỏ khoảng trắng đầu và cuối
        .split(' ')  // Tách tên thành các từ
        .map(word => word.charAt(0).toUpperCase())  // Lấy ký tự đầu của mỗi từ và viết hoa
        .join('');  // Ghép các ký tự đầu lại thành một chuỗi

    // Lấy mã nhà xuất bản đã được tạo với group
    let manxb = `NXB_${group}`;

    // Cập nhật mã nhà xuất bản vào trường input
    $('#manxb').val(manxb);

    // Lưu thông tin nhà xuất bản vào localStorage hoặc xử lý tiếp theo
    localStorage.setItem('Nxb_' + manxb, tennxb);  // Lưu tên nhà xuất bản theo mã nhà xuất bản
});

  $(document).ready(function() {
    $("#frmCreateNxb").validate({
      rules: {
        tennxb: {
          required: true,
          minlength: 3,
          maxlength: 500
        },
      },
      messages: {
        tennxb: {
          required: "Vui lòng nhập tên Nhà Xuất Bản",
          minlength: "Tên Nhà Xuất Bản phải có ít nhất 3 ký tự",
          maxlength: "Tên Nhà Xuất Bản không được vượt quá 500 ký tự"
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