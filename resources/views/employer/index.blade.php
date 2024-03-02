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
                                <div class="">
                                    {{-- <label class="-label" for="file">
                                        <i class="fa-solid fa-camera pe-1"></i>
                                        <span>Change Image</span>
                                    </label>
                                    <input id="file" type="file" onchange="loadFile(event)" /> --}}
                                </div>
                                <div class="candidate-title">
                                    <h4 class="mt-3">{{$employer->company}}</h4>
                                </div>
                            </div>
                            <ul class="custom-menu">
                                <li >
                                    <a class="active" href="">
                                        <i class="fa-regular fa-user"></i>
                                        <span>Company Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('employer.post_job')}}">
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
                                <h3 class="fw-bold text-uppercase">Company Profile</h3>
                            </div>
                            <form method="POST" action="{{ route('employer.profile.update', $employer->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="upload-btn-wrapper">
                                            <button class="btn-logo"><i class="fa-solid fa-upload pe-2"></i>Choose logo</button>
                                            <input type="file" name="logo" />
                                          </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Company Name" value= "{{$employer->company}}" name="company">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Your Email</label>
                                            <input type="email" class="form-control" placeholder="infor@gmail.com" value="{{$employer->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" placeholder="Website Link" name="website" value="{{$employer->website}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Founded Date</label>
                                            <input type="text" class="form-control" placeholder="25/01/2024" name="date" value="{{$employer->date}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" name="description">
                                               {{$employer->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-bx-title mt-5">
                                    <h3 class="fw-bold text-uppercase">Contact Information</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" placeholder="0123456789" value="{{$employer->phone}}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>City</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="city" id ="city">
                                                <option value="" selected>{{$employer->city}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>District</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="district" id ="district">
                                                <option value="" selected>{{$employer->distric}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Commune</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="ward" id ="ward">
                                                <option value="" selected>{{$employer->commune}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"class="btn btn-success py-2 px-3">Update Setting</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
