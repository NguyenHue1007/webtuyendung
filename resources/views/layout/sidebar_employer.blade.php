                        <div class="candidate-infor company-infor">
                            <div class="candidate-detail text-center">
                                <div>
                                    {{-- <label class="-label" for="file">
                                        <i class="fa-solid fa-camera pe-1"></i>
                                        <span>Change Image</span>
                                    </label>
                                    <input id="file" type="file" onchange="loadFile(event)" />
                                    <img src="https://cdn-new.topcv.vn/unsafe/150x/filters:format(webp)/https://static.topcv.vn/company_logos/beac8465d62ef14e651a81e546dd9986-5fe1a719810ff.jpg"
                                        id="output" width="150" /> --}}
                                    @if ($employer->logo)
                                        <img class="rounded-circle border" src="{{ url(Storage::url($employer->logo)) }}"
                                            width="150"  id="output">
                                    @else
                                        <img class="rounded-circle"
                                            src="{{url('img/logo_default.png')}}"
                                            width="150" id="output"/>
                                    @endif
                                </div>
                                <div class="candidate-title">
                                    <h4 class="mt-3 px-2">{{ $employer->company }}</h4>
                                </div>
                            </div>
                            <ul class="custom-menu">
                                <li>
                                    <a href="{{route('employer.index')}}">
                                        <i class="fa-solid fa-building"></i>
                                        <span>Thông tin công ty</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.post_job') }}">
                                        <i class="fa-regular fa-file"></i>
                                        <span>Tạo tin tuyển dụng</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.manage_job') }}">
                                        <i class="fa fa-briefcase"></i>
                                        <span>Quản lý tin đăng</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.manage_jobseeker') }}">
                                        <i class="fa-solid fa-users"></i>
                                        <span>Quản lý ứng viên</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.show_change_password') }}">
                                        <i class="fa fa-key"></i>
                                        <span>Thay đổi mật khẩu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.logout') }}" data-toggle="modal"
                                        data-target="#logoutModal"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                       Đăng xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('employer.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
