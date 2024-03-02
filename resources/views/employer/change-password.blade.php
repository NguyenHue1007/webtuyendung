@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <div class="page-content">
        <div class="section-full">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="candidate-infor company-infor">
                            <div class="candidate-detail text-center">
                                <div class="profile-pic">
                                    <label class="-label" for="file">
                                        <i class="fa-solid fa-camera pe-1"></i>
                                        <span>Change Image</span>
                                    </label>
                                    <input id="file" type="file" onchange="loadFile(event)" />
                                    <img src="https://cdn-new.topcv.vn/unsafe/150x/filters:format(webp)/https://static.topcv.vn/company_logos/beac8465d62ef14e651a81e546dd9986-5fe1a719810ff.jpg"
                                        id="output" width="150" />
                                </div>
                                <div class="candidate-title">
                                    <h4 class="mt-3">Công ty TNHH FPT</h4>
                                </div>
                            </div>
                            <ul class="custom-menu">
                                <li >
                                    <a href="">
                                        <i class="fa-regular fa-user"></i>
                                        <span>Company Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa-regular fa-file"></i>
                                        <span>Post a Job</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-briefcase"></i>
                                        <span>Manage jobs</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="">
                                        <i class="fa fa-key"></i>
                                        <span>Change password</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="job-bx submit-resume">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">change password</h3>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                   
                                     <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success py-2 px-4 mt-2">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
  
@endsection
