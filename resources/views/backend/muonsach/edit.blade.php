@extends('backend.layouts.master')

@section('title')
Quản trị - Chỉnh Sửa Mượn Sách
@endsection

@section('feature-title')
Chỉnh Sửa Mượn Sách
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

<form name="frmEditMuonsach" id="frmEditMuonsach" method="post" action="{{ url('admin/muonsach/update', ['id' => $muonsach->id]) }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="docgia_id">Độc Giả</label>
        <!-- Hiển thị tên độc giả, nhưng gửi ID của độc giả -->
        <input type="text" class="form-control" id="docgia_id_display" value="{{ $muonsach->docgia->tendocgia }}" readonly>
        <!-- Gửi ID của độc giả ẩn -->
        <input type="hidden" name="docgia_id" value="{{ $muonsach->docgia->id }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="thuthu_id">Nhân viên</label>
        <!-- Hiển thị tên nhân viên, nhưng gửi ID của nhân viên -->
        <input type="text" class="form-control" id="thuthu_id_display" value="{{ $muonsach->thuthu->tenthuthu }}" readonly>
        <!-- Gửi ID của nhân viên ẩn -->
        <input type="hidden" name="thuthu_id" value="{{ $muonsach->thuthu->id }}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label for="sach_id">Sách Mượn</label>
        <!-- Hiển thị tên sách, nhưng gửi ID của sách -->
        <input type="text" class="form-control" id="sach_id_display" value="{{ $muonsach->sach->tensach }}" readonly>
        <!-- Gửi ID của sách ẩn -->
        <input type="hidden" name="sach_id" value="{{ $muonsach->sach->id }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="mamuon">Mã Mượn</label>
        <input type="text" class="form-control" id="mamuon" name="mamuon" aria-describedby="mamuonHelp" placeholder="Nhập mã mượn . . . " value="{{ old('mamuon', $muonsach->mamuon) }}" readonly>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="ngaymuon">Ngày Mượn</label>
        <input type="text" class="form-control" id="ngaymuon" name="ngaymuon" aria-describedby="ngaymuonHelp" placeholder="Vd: 30/11/2019 " value="{{ old('ngaymuon', $muonsach->ngaymuon) }}" readonly>
      </div>
    </div>   
    <div class="col-md-6">
      <div class="form-group">
        <label for="hantra">Hạn Trả</label>
        <input type="text" class="form-control" id="hantra" name="hantra" aria-describedby="hantraHelp" placeholder="Nhập hạn trả . . . " value="{{ old('hantra', $muonsach->hantra) }}" readonly>
      </div>
    </div>
    <div class="col-md-6" style="display: none;">
      <div class="form-group">
        <label for="soluong">Số Lượng</label>
        <input type="text" class="form-control" id="soluong" name="soluong" aria-describedby="soluongHelp" placeholder="Nhập số lượng . . . " value="{{ old('soluong', $muonsach->soluong) }}">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="ngaytra">Ngày Trả</label>
        <input type="text" class="form-control" id="ngaytra" name="ngaytra" aria-describedby="ngaytraHelp" placeholder="Vd: 12/11/2019 " value="{{ old('ngaytra', $muonsach->ngaytra) }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="tinhtrang">Tình Trạng</label>
        <select id="tinhtrang" name="tinhtrang" class="form-control">
          @if(old('tinhtrang') == $muonsach->tinhtrang)
          <option value="{{ 0 }}" selected >Đang Mượn Sách</option>
          <option value="{{ 1 }}">Đã Trả Sách</option>
          <option value="{{ 2 }}">Quá Hạn Mượn</option>
          @else
          <option value="{{ 0 }}">Đang Mượn Sách</option>
          <option value="{{ 1 }}">Đã Trả Sách</option>
          <option value="{{ 2 }}">Quá Hạn Mượn</option>
          @endif
        </select>
      </div>
    </div>
  </div>
  <a href="{{ url('admin/muonsach') }}" class="btn btn-success">Quay về</a>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<script>
  $(document).ready(function() {
    // Xử lý validate form
    var initialNgayTra = $('#ngaytra').val();
    $("#frmEditMuonsach").validate({
      rules: {
        mamuon: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        ngaymuon: {
          required: true
        },
        hantra: {
          required: true
        },
        soluong: {
          required: true
        },
        ngaytra: {
          required: true
        },
        tinhtrang: {
          required: true
        },
        sach_id: {
          required: true
        },
        thuthu_id: {
          required: true
        },
        docgia_id: {
          required: true
        },
      },
      messages: {
        ngaytra: {
          required: "Vui lòng nhập ngày trả sách"
        },
        tinhtrang: {
          required: "Vui lòng chọn tình trạng sách"
        },
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element);
        }
        if (!element.next("span")[0]) {
          $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
            .insertAfter(element);
        }
      },
      success: function(label, element) {
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

    // Cập nhật trường 'Ngày trả' khi thay đổi 'Tình trạng'
    $('#tinhtrang').on('change', function() {
      var tinhtrangValue = $(this).val(); 
      if (tinhtrangValue == 1 || tinhtrangValue == 2) { 
        var today = new Date();
        var ngayHienTai = today.toISOString().split('T')[0]; 
        $('#ngaytra').val(ngayHienTai); 
      } else {
        $('#ngaytra').val(initialNgayTra); 
      }
    });
  });
</script>
@endsection
