
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
<div class="row justify-content-center w-100">
    <h3 class="text-uppercase text-center  text-bold" >@if(Auth::user()->unit_id==1) LOGISTICS AREA MILITARY POLICE UNIT  @elseif(Auth::user()->unit_id==2) BANGLADESH ARMY MILITARY POLICE UNIT @else BANGLADESH AIRFORCE MILITARY POLICE UNIT @endif</h3>
</div>
    {{--        <!-- SEARCH FORM -->--}}
{{--        <form class="form-inline ml-3">--}}
{{--            <div class="input-group input-group-sm">--}}
{{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-navbar" type="submit">--}}
{{--                        <i class="fas fa-search"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="{{!empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('/unit-user/image/avatar.png')}}" class="img-circle elevation-2" alt="User Image" height="50px" width="50px" style="margin-top: -14px;">
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Menu</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('unitauth.unit.user.profile')}}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-key mr-2"></i> Change Password--}}

{{--                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ url('/unitauth/logout') }}" class="dropdown-item"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                    </a>
                    <form id="logout-form" action="{{ url('/unitauth/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

