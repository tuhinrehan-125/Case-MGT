<!-- preloader  -->
<div id="preloader">
    <div id="status"></div>
</div>
<style>
    .lr-section .left-sidebar {
        width: 300px;
        border-left: 1px solid #ddd;
        box-sizing: border-box;
        padding-left: 15px;
        padding-right: 54px;
        text-align-last: left;
    }

    .text-9 {
        margin-top: 20px;
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 640px) {
        .text-9 {
            margin-top: 0px;
        }
    }

    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) {
        .text-9 {
            margin-top: 0px;
        }
    }
</style>
<!-- site-wrappper starts -->
<div id="site-wrapper">
    <!-- site-header starts -->
    <header class="site-header">

        <!-- logo-area starts -->
        <div class="logo-area">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 logo-menu">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <div class="row d-flex justify-content-center" justify="center">
                                    <div class="col-md-3 d-flex justify-content-center">
                                        <img src="{{asset('/frontend/assets/images/logo.png')}}" alt="logo">
                                    </div>
                                    <div class="com-md-9 text-9">
                                        <span class="site-title">
                                            <strong>
                                                ক্যান্টনমেন্ট বোর্ড, ঢাকা
                                            </strong>
                                            <!-- <br>
                                    <h4>আবাসিক ও অস্থায়ী পাস ম্যানেজমেন্ট</h4> -->
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="contact-info-1">
                            <div class="row">
                                <div class="contact-content">
                                    <div class="col-md-12">
                                        <span><i class="fa fa-phone"></i> Tel: 02-9835565 (T&T), 7210 (Army)</span><br>

                                    </div>
                                    <div class="col-md-12">
                                        <span><i class="fa fa-envelope"></i> Email: ceocbd@gmail.com</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <span><i class="fa fa-globe"></i> Web: http://www.dcb.gov.bd/</span>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <span><i class="fa fa-map-marker"></i> Dhaka Cantonment, Dhaka-1206</span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="contact-content map-content">


                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo-area ends -->


        <!-- main-menu-area starts -->
        <div class="main-menu-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar main-menu-navbar menu-right" id="menu">
                            <ul class="nav navbar main-menu"  id="menu-nav">
                                <li></li>
                                <li>
                                    @auth
                                    <a href="{{url('/home')}}">
                                        <i class="fas fa-list"></i>
                                        <span class="menu-text">
                                            Dashboard
                                        </span>
                                    </a>
                                    @endauth
                                    @if(!Auth::user())
                                </li>
                                <li class="login_unit" >
                                    <a href="{{url('/unitauth/login')}}"><i class="fas fa-list"></i> <span class="menu-text">Login Unit</span></a>
                                </li>
                                <li class="login_superAdmin">
                                    <a href="{{url('/superadmin/login')}}"><i class="fas fa-list"></i> <span class="menu-text">Login Super Admin</span></a>
                                </li>
                                @endif

                                <li>
                                    @auth
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user"></i>
                                        <span class="menu-text">

                                        </span>
                                        <span class="d-none">

                                        </span>
                                    </a>

                                    <ul class="sub-menu">
                                        <li>
                                            <a href="/user-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> <span class="menu-text">Log out</span></a>
                                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu-area ends -->
    </header>

    <!-- site-header ends -->
    <!-- lr-section starts -->
    {{-- <div class="lr-section " style="padding: 50px 0"> --}}
