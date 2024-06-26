@EXTENDS('layout_admin.main')

@section('content')
    <!-- Content Wrapper -->
    <div class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center px-2">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase fs-6 mb-1">
                                            Doanh thu</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$revenue}} VND</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center px-2">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase fs-6 mb-1">
                                            Nhà tuyển dụng</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countEmployers}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-address-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center px-2">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase fs-6 mb-1">
                                            Ứng viên</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUsers}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center px-2">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase fs-6 mb-1">
                                            Tin tuyển dụng</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countJobs}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-file fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
@endsection
