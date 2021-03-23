
<!-- lr-section starts -->

<div class="" style="padding: 50px 0">
<div class="row">
    <div class="col-sm-12 col-md-2">
            @auth
              <div class="mx-3">
                  <div class="left-sidebar">
                      <div class="widget">
                          <h3 class="widget-title" style="background-color: #1B9C4E;">
                              <a href="{{url('/home')}}" class="text-white" >
                                  <i class="fa fa-home"></i>
                                  <span class="menu-text">
                                        হোম
                                    </span>
                              </a>
                          </h3>
                          <ul class="widget-menu">
                              <li>
                                  <a href="{{route('new.case')}}">
                                      <i class="fab fa-wpforms"></i>New Case
                                  </a>
                              </li>
                              <li>
                                  <a href="{{route('old.case')}}">
                                      <i class="fab fa-wpforms"></i>Old Case
                                  </a>
                              </li>
                              <li>
                                  <a href="{{route('user.profile')}}">
                                      <i class="fab fa-wpforms"></i> Profile
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
        @endauth
    </div>
    <div class="col-sm-12 col-md-10">
