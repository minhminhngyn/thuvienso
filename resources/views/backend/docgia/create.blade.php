@extends('backend.layouts.master')

@section('title')
Quản Trị - Thêm Đọc Giả
@endsection

@section('feature-title')
Thêm mới Đọc Giả
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

<form name="frmCreateDocgia" id="frmCreateDocgia" method="post" action="{{ url('admin/docgia/store') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="madocgia">Mã Đọc giả</label>
    <input type="text" class="form-control" id="madocgia" name="madocgia" aria-describedby="madocgiaHelp"value="{{ old('madocgia') }}"readonly>

  </div>
  <div class="form-group">
    <label for="tendocgia">Tên Đọc giả</label>
    <input type="text" class="form-control" id="tendocgia" name="tendocgia" aria-describedby="tendocgiaHelp" placeholder="Nhập Tên đọc giả . . ." value="{{ old('tendocgia') }}">
    
  </div>
  <div class="form-group">
  <label for="chucvu">Chức vụ</label>
  <select id="chucvu" name="chucvu" class="form-control">
    <option value="sinhvien" {{ old('chucvu') == 'sinhvien' ? 'selected' : '' }}>Sinh viên</option>
    <option value="giangvien" {{ old('chucvu') == 'giangvien' ? 'selected' : '' }}>Giảng viên</option>
  </select>
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
  <div class="form-group">
    <label for="khoa_id">Khoa</label>
    <select id="khoa_id" name="khoa_id" class="form-control">
      @foreach($listKhoa as $khoa)
        @if(old('khoa_id') == $khoa->id)
        <option value="{{ $khoa->id }}" selected>{{ $khoa->tenkhoa }}</option>
        @else
        <option value="{{ $khoa->id }}">{{ $khoa->tenkhoa }}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="nganh_id">Ngành</label>
    <select id="nganh_id" name="nganh_id" class="form-control">
      @foreach($listNganh as $nganh)
      <option value="{{ $nganh->id }}">{{ $nganh->tennganh }}</option>
      @endforeach
    </select>
  </div>
  <a class="btn btn-primary" href="{{ url('admin/docgia') }}" class="btn">Quay về</a>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
  
  $(document).ready(function() {
    $("#frmCreateDocgia").validate({
      rules: {
        tendocgia: {
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
        khoa_id: {
          required: true
        },
        nganh_id: {
          required: true
        },
      },
      messages: {
        tendocgia: {
          required: "Vui lòng nhập tên đọc giả",
          minlength: "Tên đọc giả phải có ít nhất 3 ký tự",
          maxlength: "Tên đọc giả không được vượt quá 200 ký tự"
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
        khoa_id:{
          required: "Vui lòng chọn khoa"
        },
        nganh_id:{
          required: "Vui lòng chọn ngành"
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