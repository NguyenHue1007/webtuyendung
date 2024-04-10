        <!-- Sidebar -->
        <div>
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Job Board</div>
                </a>

                <!-- Divider -->
                {{-- <hr class="sidebar-divider my-0"> --}}

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-house"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">
                        <i class="fa-solid fa-blog"></i>
                        <span>Tin tức</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage_employer') }}">
                        <i class="fa-solid fa-address-book"></i>
                        <span>Nhà tuyển dụng</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage_jobseeker') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Ứng viên</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('package.index') }}">
                        <i class="fa-brands fa-servicestack"></i>
                        <span>Gói dịch vụ</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->
        </div>
