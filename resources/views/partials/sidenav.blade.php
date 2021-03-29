<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{config('app.name')}}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                    <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-file-excel"></i>
              <p>
              Import Excel Files
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/import_bu')}}" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Importer Un Fichier BU</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/import_dp')}}" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Importer Un Fichier DP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/import_do')}}" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Importer Un Fichier DO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/import_seg')}}" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Importer Un Fichier SEG</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
              <p>
              Digitalization
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/business')}}" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Business Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Digital Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Dormant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-excel"></i>
                  <p>Segmentation</p>
                </a>
              </li>
            </ul>
          </li>
                    <!--<li class="nav-item">
                            <a href="{{url('/chartjs')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Configuration</p>
                            </a>
                        </li>-->
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="nav-icon fas fa-sign-out"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></i></a>
                    </li>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>