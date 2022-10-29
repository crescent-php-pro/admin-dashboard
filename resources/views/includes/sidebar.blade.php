

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-sidebar">
  <!-- Brand Logo -->
  <a href="{{'/'}}" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->user_profile != '')
        <img class="elevation-2 img-circle"
             src="{{ asset('assets/dist/img/profile/'.Auth::user()->user_profile) }}"
             alt="User Image">
        @else
        <img class="elevation-2 img-circle"
             src="{{ asset('assets/dist/img/avatar.png')}}"
             alt="User Image Avatar">
        @endif
        <!-- <img src="{{ asset('assets/dist/img/profile/'.Auth::user()->user_profile) }}" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="{{'/'}}" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
           <a href="{{('home')}}" class="nav-link {{ (request()->is('admin/home','admin')) ? 'active' : '' }} {{ (request()->is('user/home','user')) ? 'active' : '' }} {{ (request()->is('user/news*','user')) ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
                 {{__('Dashboard')}}
             </p>
           </a>
        </li>
        <li class="nav-item">
           <a href="{{('././profile')}}" class="nav-link {{ (request()->is('admin/profile')) ? 'active' : '' }} {{ (request()->is('user/profile')) ? 'active' : '' }}">
             <i class="nav-icon fa fa-user"></i>
             <p>
                 {{__('Profile')}}
             </p>
           </a>
        </li>
        @if (Auth::user()->is_admin == 1)
        <li class="nav-item">
          <a href="{{('news')}}" class="nav-link {{ (request()->is('admin/add-news')) ? 'active' : '' }} {{ (request()->is('admin/news*')) ? 'active' : '' }}">
            <i class="nav-icon fa fa-newspaper"></i>
            <p>
                {{__('News')}}
            </p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{('messages')}}" class="nav-link {{ (request()->is('admin/messages*')) ? 'active' : '' }} {{ (request()->is('user/messages*')) ? 'active' : '' }}">
            <i class="nav-icon fa fa-sms"></i>
            <p>
                {{__('Messages')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt nav-icon"></i>
            <p>Logout</p>
          </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
