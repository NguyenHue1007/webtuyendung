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
            @if ($user->avatar)
                <img class="rounded-circle" src="{{ url(Storage::url($user->avatar)) }}"
                    width="150">
            @else
                <img class="rounded-circle"
                    src="https://th.bing.com/th/id/R.f4ee44faf35e56d31a594dc64fd0fd62?rik=NzF9YauGlFehuA&pid=ImgRaw&r=0"
                    id="output" width="150" />
            @endif
        </div>
        <div class="candidate-title">
            <h4 class="mt-3">{{$user->name}}</h4>
        </div>
    </div>
    <ul class="custom-menu">
        <li>
            <a href="{{route('user.profile')}}">
                <i class="fa-regular fa-user"></i>
                <span>Trang cá nhân</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.favoritejob')}}">
                <i class="fa-regular fa-heart"></i>
                <span>Việc làm đã lưu</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.job_apply')}}">
                <i class="fa fa-briefcase"></i>
                <span>Việc làm đã ứng tuyển</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.show_change_password')}}">
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
