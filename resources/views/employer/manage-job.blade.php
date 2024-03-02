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
                                    <a class="active" href="">
                                        <i class="fa fa-briefcase"></i>
                                        <span>Manage jobs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
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
                                <h3 class="fw-bold text-uppercase">manage jobs</h3>
                            </div>
                            <table class="table-job-bx cv-manager company-manage-job w-100">
                                <thead>
                                    <tr>
                                        <th>Job title</th>
                                        <th>Applications</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Social Media Expert</td>
                                        <td>(5) Applications</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Social Media Expert</td>
                                        <td>(5) Applications</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Social Media Expert</td>
                                        <td>(5) Applications</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Social Media Expert</td>
                                        <td>(5) Applications</td>
                                        <td>Pending</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
  
@endsection
