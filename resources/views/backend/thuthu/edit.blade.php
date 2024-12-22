@extends('backend.layouts.master')

@section('title')
Quản Trị - Sửa Thông Tin Thủ Thư
@endsection

@section('feature-title')
Sửa Thông Tin Thủ Thư
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

<form name="frmEditThuthu" id="frmEditThuthu" method="post" action="{{ url('admin/thuthu/update', ['id' => $thuthu->id]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="mathuthu">Mã Thủ Thư</label>
    <input type="text" class="form-control" id="mathuthu" name="mathuthu" aria-describedby="mathuthuHelp" placeholder="Nhập mã thủ thư . . . " value="{{ old('mathuthu', $thuthu->mathuthu) }}">
   
  </div>
  <div class="form-group">
    <label for="tenthuthu">Tên Thủ Thư</label>
    <input type="text" class="form-control" id="tenthuthu" name="tenthuthu" aria-describedby="tenthuthuHelp" placeholder="Nhập Tên thủ thư . . . " value="{{ old('tenthuthu', $thuthu->tenthuthu) }}">

  </div>
  <div class="form-group">
    <label for="gioitinh">Giới Tính</label>
    <select id="gioitinh" name="gioitinh" class="form-control">
        <option value="Nam" {{ old('gioitinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
        <option value="Nữ" {{ old('gioitinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
    </select>
</div>

  <div class="form-group">
    <label for="namsinh">Năm Sinh</label>
    <input type="text" class="form-control" id="namsinh" name="namsinh" aria-describedby="namsinhHelp" placeholder="Nhập năm sinh . . ." value="{{ old('namsinh', $thuthu->namsinh) }}">
    
  </div>
  <div class="form-group">
    <label for="diachi">Địa Chỉ</label>
    <input type="text" class="form-control" id="diachi" name="diachi" aria-describedby="diachiHelp" placeholder="Nhập địa chỉ . . ." value="{{ old('diachi', $thuthu->diachi) }}">
    
  </div>
  <div class="form-group">
    <label for="sdt">Điện thoại</label>
    <input type="text" class="form-control" id="sdt" name="sdt" aria-describedby="sdtHelp" placeholder="Nhập số điện thoại . . ." value="{{ old('sdt', $thuthu->sdt) }}">
    
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Nhập email . . ." value="{{ old('email', $thuthu->email) }}">
    
  </div>
  <div class="form-group">
    <label for="quequan">Quê Quán</label>
    <input type="text" class="form-control" id="quequan" name="quequan" aria-describedby="quequanHelp" placeholder="Nhập quê quán . . ." value="{{ old('quequan', $thuthu->quequan) }}">
    
  </div>
  <a href="{{ url('admin/thuthu') }}" class="btn">Quay về</a>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
  $(document).ready(function() {
    $("#frmEditThuthu").validate({
      rules: {
        mathuthu: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
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
        mathuthu: {
          required: "Vui lòng nhập mã thủ thư",
          minlength: "Mã thủ thư phải có ít nhất 3 ký tự",
          maxlength: "Mã thủ thư không được vượt quá 50 ký tự"
        },
        tenthuthu: {
          required: "Vui lòng nhập tên thủ thư",
          minlength: "Tên thủ thư phải có ít nhất 3 ký tự",
          maxlength: "Tên thủ thư không được vượt quá 200 ký tự"
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