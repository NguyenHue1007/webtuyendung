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
                                    <a href="{{route('employer.index')}}">
                                        <i class="fa-regular fa-user"></i>
                                        <span>Company Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="">
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
                                <h3 class="fw-bold text-uppercase">post a job</h3>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Title">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Your Email</label>
                                            <input type="email" class="form-control" placeholder="infor@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Job Type</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example">
                                                <option value="" selected>Full time</option>
                                                <option value="">Part time</option>
                                                <option value="">Enternship</option>
                                                <option value="">Freelance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <input type="text" class="form-control" placeholder="1 Year">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Minimum Salary ($):</label>
                                            <input type="text" class="form-control" placeholder="5000000">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Maximum Salary ($):</label>
                                            <input type="text" class="form-control" placeholder="10000000">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" class="form-control" placeholder="New Yord">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Dealine</label>
                                            <input type="text" class="form-control" placeholder="01/01/2024">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Job Description</label>
                                            <div class="editor" id="editor-1" style="height: 350px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Candidate Requirements</label>
                                            <div class="editor" id="editor-2" style="height: 350px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Benefits</label>
                                            <div class="editor" id="editor-3" style="height: 350px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success py-2 px-4 mt-4">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
  
@endsection
