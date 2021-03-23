
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: @if(Auth::user()->unit_id==1) #343a40   @elseif(Auth::user()->unit_id==2) linear-gradient(180deg,#001C0B,#00511F)  @elseif(Auth::user()->unit_id==3) #11405d @endif;">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
{{--        <img src="{{asset('/frontend/image/can_logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <img src="@if(Auth::user()->unit_id==1) {{asset('/logo/lmp.png')}} @elseif(Auth::user()->unit_id==2)   {{asset('/logo/army.png')}} @else {{asset('/logo/airforce.png')}} @endif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
{{--        <span class="brand-text font-weight-light text-uppercase">Cantonment Board</span>--}}
        <span class="brand-text font-weight-light text-uppercase">@if(Auth::user()->unit_id==1) MILITARY POLICE  @elseif(Auth::user()->unit_id==2) BANGLADESH ARMY @elseif(Auth::user()->unit_id==3) BAF @endif</span>
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
                    <a href="{{url('unitauth/home')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @auth
                @if(Auth::user()->unit_role_id==1)
                <li class="nav-item">
                    <a href="{{route('unitauth.new_case')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/new_case') ? 'active' : '' }}">
                       <i class="nav-icon fas fa-registered"></i>
                        <p>
                            Register Case
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.forwardcase')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/forwardcase') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-forward"></i>
                        <p>
                            Forward Case
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.forwad.report')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/forward-report') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-forward"></i>
                        <p>
                            Forward Report
                            {{-- <span class="right badge badge-danger">{{$forwardCase}}</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.drop_case')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/drop_case') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tint-slash"></i>
                        <p>
                            Drop Cases

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.allcases')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/allcases') ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            All Cases
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{route('unitauth.case.finder')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/case_finder') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-search"></i>
                            <p>
                                Case Finder
                                <span class="right badge badge-danger"><i class="fa fa-search"></i></span>
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.vehicle.tracking')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/vehicle-track') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-car "></i>
                        <p>
                           Vehicle Tracking

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('unitauth.mp_location')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/mp_location') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-map-marker"></i>
                        <p>
                            Add Location
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('unitauth.mp-case-counter')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/mp-cases') ? 'active' : '' }}">
                     <i class="nav-icon fas fa-skiing-nordic"></i>
                        <p>
                            MP Case Counter
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('unitauth.unit-user')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/Unit-user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Manager
                        </p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->unit_role_id==2)
                    <li class="nav-item">
                        <a href="{{route('unitauth.case_register_home.sub-admin')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/case_register_home-subadmin') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-registered"></i>
                            <p>
                                Register
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('unitauth.newcaselist')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/newcaselist') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                New Case (In Complete)
                                <span class="right badge badge-danger in-complete"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('unitauth.completnewcase')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/comletnewcase') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                New Case (Complete)
                                <span class="right badge badge-danger complete"></span>
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('unitauth.forward_offsofficer')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/forward-case-subadmin') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-forward"></i>
                            <p>
                                Forward Case
                                <span class="right badge badge-danger forward"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('unitauth.forwad.report')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/forward-report') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-forward"></i>
                            <p>
                                Forward Report
                                {{-- <span class="right badge badge-danger">{{$forwardCase}}</span> --}}
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('unitauth.allcase')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/allcase') ? 'active' : '' }}">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                All Case
                                <span class="right badge badge-danger all"></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('unitauth.case.finder')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/case_finder') ? 'active' : '' }}">
                        <i class="fa fa-search"></i>
                            <p>
                                Case Finder
                                <span class="right badge badge-danger"><i class="fa fa-search"></i></span>
                            </p>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->unit_role_id==3)
                    <li class="nav-item">
                        <a href="{{route('unitauth.case_register_home')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/case_register_home') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-registered"></i>
                            <p>
                                Register
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('unitauth.register_case')}}" class="nav-link btn btn-dark text-left {{ Request::is('unitauth/register_case') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Register case
                            </p>
                        </a>
                    </li>
                @endif
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
