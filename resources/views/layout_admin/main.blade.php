@INCLUDE('layout_admin.head')





<!-- Page Wrapper -->
<div id="wrapper">

    @INCLUDE('layout_admin.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" CLASS="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @INCLUDE('layout_admin.navbar')

            <!-- Begin Page Content -->
            <div CLASS="container-fluid bg-white">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                      {{ session('success') }}
                    </div>
                @endif
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

@INCLUDE('layout_admin.js')
@stack('scripts')
