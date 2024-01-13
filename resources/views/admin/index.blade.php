<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@section('header')
<div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
              </li>

            </ul>
          </nav>
          <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('admin/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        @show
          <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                    
                    <a href="#" class="d-block">{{ Auth::user()->name}} Admin </a>
                    @can('isAdmin')
                      <a href="{{ route('dashboard') }}"></a>
                    @endcan
                  </div>
                </div>
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-edit"></i>
                      <p>
                        Quản lý Sản Phẩm
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('products.create')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm Sản phẩm</p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="{{ route('products.index') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Dannh mục sản phẩm</p>
                        </a>
                      </li>
                      <!-- <li class="nav-item">
                      <a href="" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm Image</p>
                        </a>
                      </li> -->
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Loại Sản Phẩm
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('categories.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm Loại SP</p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="{{ route('categories.index') }}"class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh sách loại SP</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-shopping-cart"></i>
                      <p>
                        Quản lý Đơn Hàng
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Duyệt Đơn</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-comments"></i>
                      <p>
                        Quản lý Bình Luận
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-images"></i>
                      <p>
                        Quản lý Slideshow
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                      <p>
                        Quản lý tài khoản
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                      <a href="{{ route('admin_users.create') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Thêm Tài Khoản</p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="{{ route('admin_users.index') }}"class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Danh Tài Khoản</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-percent"></i>
                      <p>
                        Quản lý Khuyến Mãi
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-chart-bar"></i>
                      <p>
                        Thống kê, báo cáo
                      </p>
                    </a>
                  </li>
                </ul>
              <form method="post" action="{{route('logout')}}" style="position:absolute;bottom:8px;">
              @csrf
              <input type="submit" value="Đăng Xuất" class="nav-link">
              </form>

              </nav>
            </div>
              </aside>
            <div class="content-wrapper">
              @yield('content')
            </div>
          <aside class="control-sidebar control-sidebar-dark">
          </aside>
        </div>
        <footer class="main-footer">
          <strong>Admin </strong>
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.1
          </div>
      </footer>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>


</body>
</html>
