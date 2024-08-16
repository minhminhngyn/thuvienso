<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa-solid fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">QUẢN LÝ THƯ VIỆN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Quản trị hệ thống</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Chức năng ứng dụng
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- category -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="true" aria-controls="collapseCategories">
            <i class="fas fa-bookmark"></i>
            <span>Quản lý Thể Loại Sách</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng thể loại sách:</h6>
                <a class="collapse-item" href="{{ url('admin/theloaisach') }}">Danh sách Thể loại sách</a>
                <a class="collapse-item" href="{{ url('admin/theloai/print') }}">In danh sách Thể loại sách</a>
                <a class="collapse-item" href="{{ url('admin/theloai/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end category -->
      <!-- start supplier -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuppliers" aria-expanded="true" aria-controls="collapseSuppliers">
            <i class="fas fa-building"></i>
            <span>Quản lý Nhà Xuất Bản</span>
        </a>
        <div id="collapseSuppliers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng nhà xuất bản:</h6>
                <a class="collapse-item" href="{{ url('admin/nhaxuatban') }}">Danh sách Nhà xuất bản</a>
                <a class="collapse-item" href="{{ url('admin/theloai/print') }}">In danh sách Nhà xuất bản</a>
                <a class="collapse-item" href="{{ url('admin/theloai/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end supplier -->
      <!-- start khoa -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKhoa" aria-expanded="true" aria-controls="collapseKhoa">
            <i class="fas fa-university"></i>
            <span>Quản lý Khoa</span>
        </a>
        <div id="collapseKhoa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng khoa:</h6>
                <a class="collapse-item" href="{{ url('admin/khoa') }}">Danh sách Khoa</a>
                <a class="collapse-item" href="{{ url('admin/khoa/print') }}">In danh sách Khoa</a>
                <a class="collapse-item" href="{{ url('admin/khoa/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end khoa -->
      <!-- start nganh -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNganh" aria-expanded="true" aria-controls="collapseNganh">
            <i class="fa fa-building"></i>
            <span>Quản lý Ngành</span>
        </a>
        <div id="collapseNganh" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng Ngành:</h6>
                <a class="collapse-item" href="{{ url('admin/nganh') }}">Danh sách Ngành</a>
                <a class="collapse-item" href="{{ url('admin/nganh/print') }}">In danh sách Ngành</a>
                <a class="collapse-item" href="{{ url('admin/nganh/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end nganh -->

      <!-- start doc gia -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocGia" aria-expanded="true" aria-controls="        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocGia" aria-expanded="true" aria-controls="collapseNganh">
            <i class="fa fa-building"></i>
            <span>Quản lý Độc giả</span>
        </a>
        <div id="collapseDocGia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng Độc Giả:</h6>
                <a class="collapse-item" href="{{ url('admin/docgia') }}">Danh sách Độc Giả</a>
                <a class="collapse-item" href="{{ url('admin/docgia/print') }}">In danh sách Độc Giả</a>
                <a class="collapse-item" href="{{ url('admin/docgia/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end doc gia -->

            <!-- start sach -->
            <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSach" aria-expanded="true" aria-controls="        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSach" aria-expanded="true" aria-controls="collapseSach">
            <i class="fa fa-building"></i>
            <span>Quản lý Sách</span>
        </a>
        <div id="collapseSach" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng Sách:</h6>
                <a class="collapse-item" href="{{ url('admin/sach') }}">Danh sách Sách</a>
                <a class="collapse-item" href="{{ url('admin/sach/print') }}">In danh sách Sách</a>
                <a class="collapse-item" href="{{ url('admin/sach/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end sach -->
       
       <!-- end doc gia -->

            <!-- start sach -->
            <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThuThu" aria-expanded="true" aria-controls="        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThuThu" aria-expanded="true" aria-controls="collapseThuThu">
            <i class="fa fa-building"></i>
            <span>Quản lý Thủ Thư</span>
        </a>
        <div id="collapseThuThu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng Thủ Thư:</h6>
                <a class="collapse-item" href="{{ url('admin/thuthu') }}">Danh sách Thủ Thư</a>
                <a class="collapse-item" href="{{ url('admin/thuthu/print') }}">In danh sách Thủ Thư</a>
                <a class="collapse-item" href="{{ url('admin/thuthu/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end sach -->

         <!-- start sach -->
         <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMuonSach" aria-expanded="true" aria-controls="        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMuonSach" aria-expanded="true" aria-controls="collapseMuonSach">
            <i class="fa fa-building"></i>
            <span>Quản lý Mượn Sách</span>
        </a>
        <div id="collapseMuonSach" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Chức năng Mượn Sách:</h6>
                <a class="collapse-item" href="{{ url('admin/muonsach') }}">Danh sách Mượn Sách</a>
                <a class="collapse-item" href="{{ url('admin/muonsach/print') }}">In danh sách Mượn Sách</a>
                <a class="collapse-item" href="{{ url('admin/muonsach/printdg') }}">In Số Lượng Sách Đã Mượn</a>
                <a class="collapse-item" href="{{ url('admin/muonsach/create') }}">Thêm mới</a>
            </div>
        </div>
      </li>
      <!-- end sach -->
       
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>