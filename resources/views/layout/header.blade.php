  <!-- header-start -->
  <header>
      <div class="header-area ">
          <div id="" class="main-header-area">
              <div class="container-fluid ">
                  <div class="header_bottom_border">
                      <div class="row align-items-center">
                          <div class="col-xl-3 col-lg-2">
                              <div class="logo">
                                  <a href="index.html">
                                      <img src="{{url('img/logo.png')}}" alt="">
                                  </a>
                              </div>
                          </div>
                          <div class="col-xl-6 col-lg-7">
                              <div class="main-menu  d-none d-lg-block">
                                  <nav>
                                      <ul id="navigation">
                                          <li><a href="index.html">home</a></li>
                                          <li><a href="jobs.html">Browse Job</a></li>
                                          <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                              <ul class="submenu">
                                                  <li><a href="candidate.html">Candidates </a></li>
                                                  <li><a href="job_details.html">job details </a></li>
                                                  <li><a href="elements.html">elements</a></li>
                                              </ul>
                                          </li>
                                          <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                              <ul class="submenu">
                                                  <li><a href="blog.html">blog</a></li>
                                                  <li><a href="single-blog.html">single-blog</a></li>
                                              </ul>
                                          </li>
                                          <li><a href="contact.html">Contact</a></li>
                                      </ul>
                                  </nav>
                              </div>
                          </div>
                          <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                              <div class="Appointment">
                                  @if (auth()->check())
                                      <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                              data-bs-toggle="dropdown" aria-expanded="false">
                                              <img class="img-fluid" width="21" src="{{ url('img/user.png') }}">
                                              <span class="mt-2" style="color: #fff;">
                                                  {{ Auth::user()->name }}
                                              </span>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal"
                                                  data-target="#logoutModal"
                                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                              </a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  class="d-none">
                                                  @csrf
                                              </form>
                                          </ul>
                                      </div>
                                  @elseif (Auth::guard('employer')->check())
                                      <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                              data-bs-toggle="dropdown" aria-expanded="false">
                                              <img class="img-fluid" width="21" src="{{ url('img/user.png') }}">
                                              <span class="mt-2" style="color: #fff;">
                                                  {{ Auth::guard('employer')->user()->name }}
                                              </span>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('employer.logout') }}" data-toggle="modal"
                                                  data-target="#logoutModal"
                                                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                  {{ __('Logout') }}
                                              </a>
                                              <form id="logout-form" action="{{ route('employer.logout') }}" method="POST"
                                                  class="d-none">
                                                  @csrf
                                              </form>   
                                          </ul>
                                      </div>
                                  @else
                                      <div class="phone_num d-none d-xl-block">
                                          <a class="boxed-btn3 font-weight-bold" href="{{route('login')}}">Log in</a>
                                      </div>
                                      <div class="phone_num d-none d-xl-block">
                                          <a class="boxed-btn3 font-weight-bold" data-bs-toggle="modal"
                                              data-bs-target="#exampleModal" href="#">Sign
                                              in</a>
                                      </div>
                                      <div class="d-none d-lg-block">
                                          <a class="boxed-btn3" href="{{ route('employer.login') }}">Post a Job</a>
                                      </div>
                                  @endif
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="mobile_menu d-block d-lg-none"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <!-- header-end -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content pb-5">
              <div class="modal-header d-flex flex-column align-items-center justify-content-center">
                  <h3 class="modal-title" id="staticBackdropLabel">Chào bạn,</h3>
                  <p>Bạn hãy dành ra vài giây để xác nhận thông tin dưới đây nhé!
                      <img src ="img/category/ring.png" width="40">
                  </p>
              </div>
              <div class="modal-body">
                  <div class="text-center">
                      Để tối ưu tốt nhất trải nghiệm của bạn với Job board,<br>
                      vui lòng chọn nhóm phù hợp nhất với bạn
                  </div>
                  <div class="row d-flex justify-content-between">
                      <div class="col-6 text-center">
                          <img src="img/job/bussiness.png" width="400">
                          <a class="btn btn-success text-white rounded-pill px-3 py-1 fw-light"
                              href="{{ route('employer.register.index') }}">
                              Tôi là nhà tuyển dụng</a>
                      </div>
                      <div class="col-6 text-center">
                          <img src="img/job/student.png" width="400">
                          <a class="btn btn-success text-white rounded-pill px-3 py-1 fw-light"
                              href="{{ route('register') }}">
                              Tôi là ứng viên tìm việc</a>
                      </div>
                  </div>
              </div>
              {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
              </div> --}}
          </div>
      </div>
  </div>
