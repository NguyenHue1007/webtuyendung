{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employer.register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layout.main')

@section('content')
    <div class="container mb-5">
        <div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-5">
            <div class="form-register">
                <h2 class ="text-primary mb-4">Đăng ký tài khoản nhà tuyển dụng</h2>
                <div class="d-flex mb-3">
                    <span class="text-account">Tài khoản</span>
                </div>
                <form method="POST" action="{{route('employer.register')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Email đăng nhập <span class="text-danger">*</span> </label >
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control border border-start-0" id="exampleInputEmail1" name="email"
                                    placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark" for="formGroupExampleInput2">Mật khẩu <span
                                    class="text-danger">*</span></label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-lock"></i></span>
                                <input type="password" class="form-control border border-start-0"
                                    id="formGroupExampleInput2" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark" for="formGroupExampleInput2">Nhập lại mật khẩu <span
                                    class="text-danger">*</span></label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-lock"></i></span>
                                <input type="password" class="form-control border border-start-0"
                                    id="formGroupExampleInput2" name="password_confirmation" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-register mt-4">
                        <div class="d-flex mb-3">
                            <span class="text-account">Thông tin nhà tuyển dụng</span>
                        </div>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label fw-bold text-dark" for="formGroupExampleInput">Họ và tên <span
                                            class="text-danger">*</span> </label>
                                    <div class="input-group bg-white">
                                        <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                        <input type="text" class="form-control border border-start-0"
                                            id="formGroupExampleInput" name="name" placeholder="Họ và tên">
                                    </div>
                                </div>
                                <div class="col ms-5">
                                    <label for="exampleInputPhone" class="form-label fw-bold text-dark">Số điện thoại cá
                                        nhân<span class="text-danger"> *</span> </label>
                                    <div class="input-group bg-white">
                                        <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                                class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control border border-start-0" id="exampleInputPhone" name="phone"
                                            placeholder="Số điện thoại cá nhân">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label fw-bold text-dark">Tên công ty
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group bg-white">
                                        <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                                class="fa fa-building"></i></span>
                                        <input type="text" class="form-control border border-start-0"
                                            placeholder="Tên công ty" name="company">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label fw-bold text-dark">Địa điểm làm
                                        việc<span class="text-danger"> *</span> </label>
                                    <div class="input-group bg-white">
                                        <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                                class="fa fa-city"></i></span>
                                        <select class="form-control border-start-0" aria-label="Default select example"
                                            name="city" id="city">
                                            <option value="" selected>Chọn tỉnh/thành phố</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col ms-5">
                                    <div class="">
                                        <label class="form-label fw-bold text-dark"
                                            for="formGroupExampleInputDistric">Quận/Huyện<span class="text-danger">
                                                *</span>
                                        </label>
                                        <div class="input-group bg-white">
                                            <span class="input-group-text bg-white input-icon" id="basic-addon1">
                                                <i class="fa-solid fa-mountain-city"></i></span>
                                            <select class="form-control border-start-0"
                                                aria-label="Default select example" name="district" id ="district">
                                                <option value="" selected>Chọn quận/huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label fw-bold text-dark"
                                        for="formGroupExampleInputDistric">Xã/Phường<span class="text-danger"> *</span>
                                    </label>
                                    <div class="input-group bg-white">
                                        <span class="input-group-text bg-white input-icon" id="basic-addon1">
                                            <i class="fa-solid fa-tower-observation"></i></i></span>
                                        <select class="form-control border-start-0" aria-label="Default select example"
                                            name="ward" id ="ward">
                                            <option value="" selected>Chọn xã/phường </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-success w-100">Hoàn tất</button>
                            </div>
                            <div class="form-group mt-4 text-center fw-light" style="font-size: 15px">
                                <span>Đã có tài khoản?</span>
                                <a href="" class="text-success px-2">Đăng nhập ngay</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
