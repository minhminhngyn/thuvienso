@extends('backend.layouts.master')

@section('title')
Quản Trị - Thêm mới Sách
@endsection

@section('feature-title')
Thêm mới Sách
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

<form name="frmCreateSach" id="frmCreateSach" method="post" action="{{ url('admin/sach/store') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="masach">Mã Sách</label>
    <input type="text" class="form-control" id="masach" name="masach" aria-describedby="masachHelp" placeholder="Nhập mã sách . . ." value="{{ old('masach') }}">

  </div>
  <div class="form-group">
    <label for="tensach">Tên Sách</label>
    <input type="text" class="form-control" id="tensach" name="tensach" aria-describedby="tensachHelp" placeholder="Nhập Tên sách . . ." value="{{ old('tensach') }}">
    
  </div>
  <div class="form-group">
    <label for="tentacgia">Tên Tác Giả</label>
    <input type="text" class="form-control" id="tentacgia" name="tentacgia" aria-describedby="tentacgiaHelp" placeholder="Nhập Tên tác giả . . ." value="{{ old('tentacgia') }}">
    
  </div>
  <div class="form-group">
    <label for="anh">Ảnh đại diện sách</label>
    <input type="file" class="form-control" id="anh" name="anh" aria-describedby="anhHelp" >
  
  </div>
  <div class="form-group">
    <label for="soluong">Số lượng Sách</label>
    <input type="text" class="form-control" id="soluong" name="soluong" aria-describedby="soluongHelp" placeholder="Nhập Số lượng sách . . ." value="{{ old('soluong') }}">
  </div>
  <div class="form-group">
    <label for="trangthaisach">Trạng Thái Sách</label>
    @if(old('trangthaisach'))
    <input type="checkbox" class="form-control" id="trangthaisach" name="trangthaisach" aria-describedby="trangthaisachHelp" checked>
    @else
    <input type="checkbox" class="form-control" id="trangthaisach" name="trangthaisach" aria-describedby="trangthaisachHelp">
    @endif
  </div>
  <div class="form-group">
    <label for="theloai_id">Thể loại</label>
    <select id="theloai_id" name="theloai_id" class="form-control">
      @foreach($listTheloai as $theloai)
        @if(old('theloai_id') == $theloai->id)
        <option value="{{ $theloai->id }}" selected>{{ $theloai->tentheloai }}</option>
        @else
        <option value="{{ $theloai->id }}">{{ $theloai->tentheloai }}</option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="nxb_id">Nhà cung cấp</label>
    <select id="nxb_id" name="nxb_id" class="form-control">
      @foreach($listNxb as $nxb)
      <option value="{{ $nxb->id }}">{{ $nxb->tennxb }}</option>
      @endforeach
    </select>
  </div>
  <a class="btn btn-primary" href="{{ url('admin/sach') }}" class="btn">Quay về</a>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
  $(document).ready(function() {
    $("#frmCreateSach").validate({
      rules: {
        masach: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        tensach: {
          required: true,
          minlength: 3,
          maxlength: 500
        },
        tentacgia: {
          required: true,
          minlength: 3,
          maxlength: 200
        },
        soluong: {
          required: true
        },
        anh: {
          required: true
        },
        theloai_id: {
          required: true
        },
        nxb_id: {
          required: true
        },
      },
      messages: {
        masach: {
          required: "Vui lòng nhập mã sách",
          minlength: "Mã sách phải có ít nhất 3 ký tự",
          maxlength: "Mã sách không được vượt quá 50 ký tự"
        },
        tensach: {
          required: "Vui lòng nhập tên sách",
          minlength: "Tên sách phải có ít nhất 3 ký tự",
          maxlength: "Tên sách không được vượt quá 500 ký tự"
        },
        tentacgia: {
          required: "Vui lòng nhập tên tác giả",
          minlength: "Tên tác giả phải có ít nhất 3 ký tự",
          maxlength: "Tên tác giả không được vượt quá 200 ký tự"
        },
        soluong: {
          required: "Vui lòng nhập số lượng của sách"
        },
        anh: {
          required: "Vui lòng chọn ảnh đại diện cho sách"
        },
        theloai_id:{
          required: "Vui lòng chọn thể loại"
        },
        nxb_id: {
          required: "Vui lòng chọn nhà xuất bản"
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