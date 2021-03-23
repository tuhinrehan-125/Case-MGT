  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

      <div class="text-center  mx-auto">
                <!--<a href="{{url('/dashboard')}}">-->
                    <img src="{{asset('/frontend/image/can_logo.png')}}" class="v-hidden" alt="logo" height="50px" width="50px">
      </div>
      <div class="text-center mx-auto">
                        <h3><center class="text-uppercase">Cantonment Board,Dhaka<!-- মিলিটারি পুলিশ,ঢাকা --></center></h3>
                        <!-- যানবাহন মামলা নিষ্পত্তি -->
                <!--</a>-->
      </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <!--<a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
      -->
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <!--<a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
      -->
      </li>
      <li class="nav-item">
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
                      <a href="{{route('superadmin.profile')}}" class="dropdown-item">
                          <i class="fas fa-user mr-2"></i> Profile
                      </a>
                      @if(Auth::user()->role_id==1)
                        <a href="{{route('superadmin.admin-index')}}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Admins
                        </a>
                        @endif
                      {{--                    <div class="dropdown-divider"></div>--}}
                      {{--                    <a href="#" class="dropdown-item">--}}
                      {{--                        <i class="fas fa-key mr-2"></i> Change Password--}}

                      {{--                    </a>--}}
                      <div class="dropdown-divider"></div>
                      <a href="{{ url('/superadmin/logout') }}" class="dropdown-item"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                      </a>
                      <form id="logout-form" action="{{ url('/superadmin/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      <div class="dropdown-divider"></div>
                  </div>
              </li>
          </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
