
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('/frontend/image/can_logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-uppercase">Cantonment Board</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{!empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('/unit-user/image/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{url('superadmin/home')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('superadmin.sa_forward_case')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/sa_forward_case') ? 'active' : '' }}">
                    <i class="fas fa-backward"></i>
                    <p class="text">Forward Case</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.accept_case')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/accept_case') ? 'active' : '' }}">
                    <i class="fas fa-vote-yea"></i>
                    <p class="text">Accept Case</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.release.data')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/release-data') ? 'active' : '' }}">
{{--                    <i class="nav-icon far fa-circle "></i>--}}
                    <i class="fas fa-plane-departure "></i>
                    <p class="text">Release Case</p>
                </a>
            </li>
            @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
            <li class="nav-item">
                <a href="{{route('superadmin.drop.case')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/drop-case') ? 'active' : '' }} ">
                    <i class=" nav-icon fas fa-trash "></i>
                    <p class="text">Drop Case</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{route('superadmin.all.invoice')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/all-invoice') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-invoice "></i>
                    <p class="text">Invoice</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.withdraw.request')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/pendding-withdraw-case') ? 'active' : '' }}">
                    <i class="nav-icon fas  fa-plus-square "></i>
                    <p class="text">Withdraw Request</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.case.finder')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/case-finder') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-search "></i>
                    <p class="text">Case Finder</p>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="nav-link btn btn-dark"text-left >
                    <i class="nav-icon far fa-circle "></i>
                    <p class="text">Report</p>
                </a>
            </li> -->
            @if(Auth::user()->role_id==1)

            <li class="nav-item">
                <a href="{{route('superadmin.vehicle.tracking')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/vhicle-tracking') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-car"></i>
                    <p>
                        Vehicle Tracking
                        <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                </a>
            </li>
          <li class="nav-item has-treeview {{ Request::is('superadmin/current-month') || Request::is('superadmin/monthly-report') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link btn btn-dark text-left" >
                <i class="nav-icon fas fa-calendar-week"></i>
            {{-- <i class="nav-icon <i class="fas fa-calendar-week"></i> "></i> --}}
              <p>
              Report
                <i class="fas fa-angle-left right"></i>
                {{--<span class="badge badge-info right">6</span>--}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item mx-3">
                <a href="{{route('superadmin.current.month')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/current-month') ? 'active' : '' }}">
                  <i class="fas fa-calendar-week"></i>
                  <p>Current</p>
                </a>
              </li>
              <li class="nav-item mx-3">
                <a href="{{route('superadmin.monthly.report')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/monthly-report') ? 'active' : '' }}">
                    <i class="far fa-calendar-alt"></i>
                  <p>Monthly</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="" class="nav-link btn btn-dark"text-left >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Custome</p>
                </a>
              </li> --}}
            </ul>
          </li>
            <li class="nav-item">
                <a href="{{route('superadmin.mp_vehicletype')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/mp_vehicletype') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-car"></i>
                    <p>
                        Add Vehicle Type
                        <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.box')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/box') ? 'active' : '' }}">
                    <i class="fas fa-box "></i>
                    <p>
                      Box
                        <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('superadmin.mp_crimelist')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/mp_crimelist') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-star"></i>
                    <p>
                        Add Crime List
                        <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.paper')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/paper_add') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Add Type of Paper
                        <!--<span class="right badge badge-danger">New</span>-->
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('superadmin.unit-user')}}" class="nav-link btn btn-dark text-left {{ Request::is('superadmin/Unit-user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user "></i>
                    <p class="text">Unit User</p>
                </a>
            </li>
        <li class="nav-item ">
                <a href="{{route('superadmin.user.management')}}" class="nav-link btn btn-dark text-left  {{ Request::is('superadmin/user-management') ? 'active' : '' }}">
                    <i class="fa fa-user-circle " aria-hidden="true"></i>
                    <p class="text">User Managment</p>
                </a>
            </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
