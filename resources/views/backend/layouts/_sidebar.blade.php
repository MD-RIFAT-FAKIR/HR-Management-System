  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('public/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Logout -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('logout') }}">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('public/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->profile_img)
          <img style="width:30px; height:30px;" src="{{ url('upload/'.Auth::user()->profile_img) }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ (Request::segment(2) == 'dashboard') ? 'active' : ''}} ">
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/employees') }}" class="nav-link {{ (Request::segment(2) == 'employees') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Employees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/jobs') }}" class="nav-link {{ (Request::segment(2) == 'jobs') ? 'active' : '' }} ">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Jobs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/job_history') }}" class="nav-link {{ (Request::segment(2) == 'job_history') ? 'active' : '' }}">
              <i class="nav-icon fa fa-history"></i>
              <p>
                Job History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/job_grades') }}" class="nav-link {{ (Request::segment(2) == 'job_grades') ? 'active' : '' }}">
              <i class="nav-icon fa fa-star"></i>
              <p>
                Job Grades
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/regions') }}" class="nav-link {{ Request::segment(2) == 'regions' ? 'active' : '' }}">
              <i class="nav-icon fa fa-globe"></i>
              <p>
                Regions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/countries') }}" class="nav-link {{ (Request::segment(2) == 'countries' ? 'active' : '' ) }}">
              <i class="nav-icon fa fa-flag"></i>
              <p>
                Countries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/locations') }}" class="nav-link {{ (Request::segment(2)) == 'locations' ? 'active' : '' }}">
              <i class="nav-icon fa fa-map-marker-alt"></i>
              <p>
                Locations
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{ url('admin/departments') }}" class="nav-link {{ (Request::segment(2)) == 'departments' ? 'active' : '' }}">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Department
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="{{ url('admin/manager') }}" class="nav-link {{ (Request::segment(2)) == 'manager' ? 'active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Manager
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="{{ url('admin/my_acount') }}" class="nav-link {{ (Request::segment(2)) == 'my_acount' ? 'active' : '' }}">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                My Acount
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="{{ url('admin/payroll') }}" class="nav-link {{ (Request::segment(2)) == 'payroll' ? 'active' : '' }}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
               Pay Roll
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="{{ url('admin/position') }}" class="nav-link {{ (Request::segment(2)) == 'position' ? 'active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p>
               Position
              </p>
            </a>
          </li>       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>