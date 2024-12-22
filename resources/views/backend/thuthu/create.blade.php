@extends('backend.layouts.master')

@section('title')
Quản Trị - Thêm Thủ Thư
@endsection

@section('feature-title')
Thêm mới Thủ Thư
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

<form name="frmCreateThuthu" id="frmCreateThuthu" method="post" action="{{ url('admin/thuthu/store') }}" enctype="multipart/form-data">
  {{ csrf_field() }} 
  <div class="form-group">
    <label for="mathuthu">Mã Thủ thư</label>
    <input type="text" class="form-control" id="mathuthu" name="mathuthu" aria-describedby="mathuthuHelp" value="{{ old('mathuthu') }}"readonly>

  </div>
  <div class="form-group">
    <label for="tenthuthu">Tên Thủ thư</label>
    <input type="text" class="form-control" id="tenthuthu" name="tenthuthu" aria-describedby="tenthuthuHelp" placeholder="Nhập Tên Thủ thư . . ." value="{{ old('tenthuthu') }}">
    
  </div>
  <div class="form-group">
    <!--<label for="gioitinh">Giới Tính</label>
    <input type="text" class="form-control" id="gioitinh" name="gioitinh" aria-describedby="gioitinhHelp" placeholder="Nhập giới tính . . ." value="{{ old('gioitinh') }}">!-->
    <div class="form-group">
    <label for="gioitinh">Giới Tính</label>
    <select id="gioitinh" name="gioitinh" class="form-control">
        <option value="Nam" {{ old('gioitinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
        <option value="Nữ" {{ old('gioitinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
    </select>
</div>

  </div>
  <div class="form-group">
    <label for="namsinh">Năm Sinh</label>
    <input type="text" class="form-control" id="namsinh" name="namsinh" aria-describedby="namsinhHelp" placeholder="Nhập năm sinh . . ." value="{{ old('namsinh') }}">
    
  </div>
  <div class="form-group">
    <label for="diachi">Địa Chỉ</label>
    <input type="text" class="form-control" id="diachi" name="diachi" aria-describedby="diachiHelp" placeholder="Nhập địa chỉ . . ." value="{{ old('diachi') }}">
    
  </div>
  <div class="form-group">
    <label for="sdt">Điện thoại</label>
    <input type="text" class="form-control" id="sdt" name="sdt" aria-describedby="sdtHelp" placeholder="Nhập số điện thoại . . ." value="{{ old('sdt') }}">
    
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email . . ." value="{{ old('email') }}">
    
  </div>
  <div class="form-group">
    <label for="quequan">Quê Quán</label>
    <input type="text" class="form-control" id="quequan" name="quequan" aria-describedby="quequanHelp" placeholder="Nhập quê quán . . ." value="{{ old('quequan') }}">
    
  </div>
  <a class="btn btn-primary" href="{{ url('backend/thuthu') }}" class="btn">Quay về</a>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
  // Kiểm tra xem trong localStorage đã có giá trị đếm chưa, nếu chưa thì gán giá trị mặc định là 1
if (!localStorage.getItem('currentID')) {
    localStorage.setItem('currentID', 100000); // Khởi tạo số ID bắt đầu từ 100000
}

// Hàm tạo mã thủ thư
function generateMaThuThu() {
    // Lấy số ID ngẫu nhiên từ localStorage và đảm bảo là duy nhất
    let currentID = parseInt(localStorage.getItem('currentID'), 10);
    
    // Tạo mã thủ thư với ID là 6 chữ số
    const maThuThu = `TT_${String(currentID).padStart(6, '0')}`;

    // Cập nhật số ID tiếp theo trong localStorage (tăng dần)
    localStorage.setItem('currentID', currentID + 1);

    // Trả về mã thủ thư
    return maThuThu;
}

// Cập nhật mã thủ thư ban đầu vào trường input
$('#mathuthu').val(generateMaThuThu());  // Mã thủ thư sẽ có cấu trúc TT_<id>

// Khi nhấn nút lưu, tạo mã thủ thư và lưu lại
$('#saveButton').click(function() {
    const maThuThu = generateMaThuThu(); // Tạo mã thủ thư

    // Cập nhật mã thủ thư vào trường input
    $('#mathuthu').val(maThuThu);

    // Lưu thông tin thủ thư vào localStorage hoặc xử lý tiếp theo
    localStorage.setItem('thuThu_' + maThuThu, 'Thủ thư: ' + maThuThu);  // Lưu tên thủ thư theo mã thủ thư
});

  $(document).ready(function() {
    $("#frmCreateThuthu").validate({
      rules: {
        tenthuthu: {
          required: true,
          minlength: 3,
          maxlength: 200
        },
        namsinh: {
          required: true,
          minlength: 4,
          maxlength: 200
        },
        diachi: {
          required: true,
          minlength: 6,
          maxlength: 500
        },
        sdt: {
          required: true,
          minlength: 9,
          maxlength: 25
        },
        email: {
          required: true,
          minlength: 6,
          maxlength: 200
        },
        quequan: {
          required: true,
          minlength: 6,
          maxlength: 200
        },
      },
      messages: {
        tenthuthu: {
          required: "Vui lòng nhập tên Thủ thư",
          minlength: "Tên Thủ thư phải có ít nhất 3 ký tự",
          maxlength: "Tên Thủ thư không được vượt quá 200 ký tự"
        },
        namsinh: {
          required: "Vui lòng nhập năm sinh",
          minlength: "Năm sinh phải có ít nhất 4 ký tự",
          maxlength: "Năm sinh không được vượt quá 200 ký tự"
        },
        diachi: {
          required:  "Vui lòng nhập địa chỉ",
          minlength: "Địa chỉ phải có ít nhất 6 ký tự",
          maxlength: "Địa chỉ không được vượt quá 500 ký tự"
        },
        sdt: {
          required: "Vui lòng nhập số điện thoại",
          minlength: "Số điện thoại phải có ít nhất 9 ký tự",
          maxlength: "Số điện thoại không được vượt quá 25 ký tự"
        },
        email: {
          required: "Vui lòng nhập địa chỉ mail",
          minlength: "Địa chỉ mail phải có ít nhất 6 ký tự",
          maxlength: "Địa chỉ mail không được vượt quá 200 ký tự"
        },
        quequan: {
          required: "Vui lòng nhập địa chỉ quê quán",
          minlength: "Địa chỉ quê quán phải có ít nhất 6 ký tự",
          maxlength: "Địa chỉ quê quán không được vượt quá 200 ký tự"
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