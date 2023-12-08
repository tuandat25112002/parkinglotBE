<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            @if(isset(Auth::user()->avatar))
              <img src="{{asset(Auth::user()->avatar)}}" alt="image">
            @else
              <img src="{{asset('admin/images/avatar-default.png')}}" alt="image">
            @endif
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth::user()->name}}</span>
            <span class="text-secondary text-small"><?php echo Auth::user()->role == 0 ? "Administrator" : "Quản lý bãi giữ xe"?></span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      @if(Auth::user()->role==0)
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Danh mục</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('categories.create')}}">Thêm danh mục</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Danh sách danh mục</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user-manager" aria-expanded="false" aria-controls="user-manager">
          <span class="menu-title">Quản lý người dùng</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
        <div class="collapse" id="user-manager">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('new-user')}}">Thêm người dùng</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('list-user')}}">Danh sách người dùng</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#park-manager" aria-expanded="false" aria-controls="park-manager">
          <span class="menu-title">Quản lý bãi đổ xe</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-car-connected menu-icon"></i>
        </a>
        <div class="collapse" id="park-manager">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('new-park')}}">Thêm bãi đổ xe</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('list-park')}}">Danh sách bãi đổ xe</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-ban" aria-expanded="false" aria-controls="ui-ban">
          <span class="menu-title">QL tuyến đường cấm</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-ban">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('new-row')}}">Thêm tuyến đường cấm</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('list-row')}}">Danh sách tuyến đường cấm</a></li>
          </ul>
        </div>
      </li>
      @else 
      @endif
      <li class="nav-item">
        <a class="nav-link" href="">
          <span class="menu-title">Thống kê</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <span class="menu-title">Lịch sử sử dụng</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Sample Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item sidebar-actions">
        <span class="nav-link">
          <div class="border-bottom">
            <h6 class="font-weight-normal mb-3">Projects</h6>
          </div>
          <a href="{{route('logout')}}" class="btn btn-block btn-lg btn-gradient-primary mt-4">Đăng xuất</a>
          <div class="mt-4">
            <div class="border-bottom">
              <p class="text-secondary">Categories</p>
            </div>
            <ul class="gradient-bullet-list mt-4">
              <li>Free</li>
              <li>Pro</li>
            </ul>
          </div>
        </span>
      </li>
    </ul>
  </nav>
