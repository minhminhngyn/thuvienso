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
  <a class="nav-link" href="{{ url('admin/theloaisach') }}">
    <i class="fas fa-bookmark"></i>
    <span>Quản lý Thể Loại Sách</span>
  </a>
</li>

      <!-- end category -->
      <!-- start supplier -->
      <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/nhaxuatban') }}">
    <i class="fas fa-building"></i>
    <span>Quản lý Nhà Xuất Bản</span>
  </a>
</li>

      <!-- end supplier -->
      <!-- start khoa -->
      <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/khoa') }}">
    <i class="fas fa-university"></i>
    <span>Quản lý Khoa</span>
  </a>
</li>

      <!-- end khoa -->
      <!-- start nganh -->
      <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/nganh') }}">
    <i class="fa fa-building"></i>
    <span>Quản lý Ngành</span>
  </a>
</li>

      <!-- end nganh -->

      <!-- start doc gia -->
      <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/docgia') }}">
    <i class="fa fa-building"></i>
    <span>Quản lý Độc giả</span>
  </a>
</li>

      <!-- end doc gia -->

            <!-- start sach -->
            <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/sach') }}">
    <i class="fa fa-building"></i>
    <span>Quản lý Sách</span>
  </a>
</li>

      <!-- end sach -->
       
       <!-- end doc gia -->

            <!-- start sach -->
            <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/thuthu') }}">
    <i class="fa fa-building"></i>
    <span>Quản lý Thủ Thư</span>
  </a>
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
                <a class="collapse-item" href="{{ url('admin/muonsach/printdg') }}">In Số Lượng Sách Đã Mượn</a>
            </div>
        </div>
      </li>
      <!-- end sach -->
       
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>