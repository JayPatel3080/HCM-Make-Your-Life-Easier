main.blade.php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Patient Matrix</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('dist/css/') }}" />
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}" />
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{ asset('dist/img/pm-logo.jpg') }}" alt="AdminLTELogo" height="60" width="60" />
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> --}}
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img src="{{ asset('dist/img/pm-logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Patient Matrix</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              {{-- <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a> --}}
              @if (Auth::user()->role == "super_admin")
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt nav-icon"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                      <i class="fa-solid fa-user nav-icon"></i>
                      <p>User Managment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('appoinment.index')}}" class="nav-link">
                      <i class="far fa-calendar nav-icon"></i>
                      <p>Appoinment Managment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('tasks.index')}}" class="nav-link">
                      <i class="fas fa-tasks nav-icon"></i>
                      <p>Tasks</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('doctor.index')}}" class="nav-link">
                      <i class="fas fa-user-md nav-icon"></i>
                      <p>Doctor Managment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                      

                      <i class="fas fa-sign-out-alt nav-icon"></i>

                      {{ __('Logout') }}
                      <div >
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </a>
                  </li>
                  
                </ul>
              @elseif (Auth::user()->role == "patient")
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="{{route('appoinment.index')}}" class="nav-link">
                      <i class="far fa-calendar nav-icon"></i>
                      <p>Appoinment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link"href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                      

                      <i class="fas fa-sign-out-alt nav-icon"></i>

                      {{ __('Logout') }}
                      <div >
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    </a>
                  </li>
                  
                </ul>
              @elseif( Auth::user()->role == "staff" || Auth::user()->role == "doctor")
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('home')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{route('appoinment.index')}}" class="nav-link">
                    <i class="far fa-calendar nav-icon"></i>
                    <p>Appoinment</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('tasks.index')}}" class="nav-link">
                    <i class="fas fa-tasks nav-icon"></i>
                    <p>Tasks</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                    

                    <i class="fas fa-sign-out-alt nav-icon"></i>

                    {{ __('Logout') }}
                    <div >
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                  </a>
                </li>
                
              </ul>
              @endif
              
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
   
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      
      <!-- Main content -->
      
      <!-- /.content -->
      {{-- <main> --}}
        @yield('content')
      {{-- </main> --}}
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
  @yield('script')
</body>
</html>