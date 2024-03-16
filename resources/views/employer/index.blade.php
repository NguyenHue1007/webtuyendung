@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <div class="page-content">
        <div class="section-full">
            <div class="container-content mt-5 mb-5">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        @INCLUDE('layout.sidebar_employer')
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="job-bx submit-resume">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">Thông tin công ty</h3>
                            </div>
                            <form method="POST"
                                action="{{ route('employer.profile.update', $employer->id) }}"enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="upload-btn-wrapper">
                                            <button class="btn-logo"><i class="fa-solid fa-upload pe-2"></i>Chọn logo</button>
                                            <input type="file" name="logo" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Tên công ty</label>
                                            <input type="text" class="form-control" placeholder="Enter Company Name"
                                                value= "{{ $employer->company }}" name="company">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="infor@gmail.com"
                                                value="{{ $employer->email }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" placeholder="Website Link"
                                                name="website" value="{{ $employer->website }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Ngày thành lập</label>
                                            <input type="text" class="form-control" placeholder="25/01/2024"
                                                name="date" value="{{ $employer->date }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <div class="form-floating">
                                                <textarea class="form-control line-text" rows="10"> {{ $employer->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="job-bx-title mt-5">
                                    <h3 class="fw-bold text-uppercase">Thông tin liên hệ</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" placeholder="0123456789"
                                                value="{{ $employer->phone }}" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Tỉnh/Thành phố</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="city" id ="city">
                                                <option value="" selected>{{ $employer->city }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Quận/Huyện</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1 custom-select"
                                                aria-label="Default select example" name="district" id ="district">
                                                <option value="" selected>{{ $employer->distric }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Xã/Phường</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="ward" id ="ward">
                                                <option value="" selected>{{ $employer->commune }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"class="btn btn-success py-2 px-3">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
