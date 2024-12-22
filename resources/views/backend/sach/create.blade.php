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
    <input type="text" class="form-control" id="masach" name="masach" aria-describedby="masachHelp" value="{{ old('masach') }}"readonly>

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
// Kiểm tra và khởi tạo giá trị đếm trong localStorage nếu chưa có
if (!localStorage.getItem('currentBookCount')) {
    localStorage.setItem('currentBookCount', 1); // Bắt đầu từ 1
}

// Hàm tạo mã sách với cấu trúc <id>_<theloai>_<tensach>
function generateBookCode() {
    const theloai_id = $('#theloai_id').val().trim(); // Lấy giá trị thể loại ID (theloai_id)
    const tensach = $('#tensach').val().trim(); // Lấy giá trị tên sách
    let currentCount = parseInt(localStorage.getItem('currentBookCount'), 10); // Lấy ID hiện tại
    currentCount++; // Tăng giá trị ID
    localStorage.setItem('currentBookCount', currentCount); // Lưu giá trị mới vào localStorage

    const id = String(currentCount).padStart(2, '0'); // Định dạng ID 2 chữ số

    // Nếu không có tên sách và thể loại, trả về mã mặc định
    if (!theloai_id && !tensach) {
        return `${id}__`; // Trả về mã mặc định với format id__
    }

    // Tạo phần <theloaiCode> từ giá trị thể loại (theloai_id)
    const theloaiCode = theloai_id; // Giả sử thể loại đã được lưu dưới dạng ID, không cần chuyển đổi

    // Tạo phần <tensachCode> từ các chữ cái đầu của mỗi từ trong tên sách
    const tensachCode = tensach
        .split(/\s+/) // Tách tên sách thành các từ (xử lý nhiều dấu cách)
        .map(word => word.charAt(0).toUpperCase()) // Lấy ký tự đầu của mỗi từ, viết hoa
        .join(''); // Ghép các ký tự đầu thành chuỗi

    // Trả về mã sách hoàn chỉnh
    return `${id}_${theloaiCode}_${tensachCode}`;
}

// Hàm cập nhật mã sách trong input
function updateBookCode() {
    $('#masach').val(generateBookCode());
}

// Cập nhật mã sách ban đầu
updateBookCode();

// Lắng nghe sự kiện khi nhập vào trường thể loại hoặc tên sách
$('#theloai_id, #tensach').on('input', function() {
    updateBookCode(); // Cập nhật mã sách khi thể loại hoặc tên sách thay đổi
});

// Xử lý khi người dùng nhấn nút lưu
$('#saveButton').click(function() {
    // Lấy mã sách và thông tin thể loại, tên sách
    const masach = $('#masach').val();
    const theloai_id = $('#theloai_id').val().trim();
    const tensach = $('#tensach').val().trim();
    // Hiển thị hoặc gửi thông tin
    console.log(`Mã sách: ${masach}, Thể loại ID: ${theloai_id || 'Không nhập'}, Tên sách: ${tensach || 'Không nhập'}`);
    alert(`Mã sách được lưu: ${masach}`);

    // Reset form
    $('#theloai_id').val('');
    $('#tensach').val('');
    updateBookCode(); // Cập nhật mã mới
});

  $(document).ready(function() {
    $("#frmCreateSach").validate({
      rules: {
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