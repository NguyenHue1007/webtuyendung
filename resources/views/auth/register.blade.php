{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center vh-100">
            <div class="col" style="max-width: 600px">
                <div class="mb-4">
                    <h3 class="text-primary fw-bold mb-2">Chào mừng bạn đã đến với Job Board</h3>
                    <span style="font-size: 15px; color: #7f878f">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự nghiệp lý tưởng</span>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label text-dark">Họ và tên</label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-user"></i></span>
                                <input type="text" class="form-control border border-start-0" id="exampleInputName"
                                    placeholder="Họ và tên" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-dark">Email</label>
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
                            <label class="form-label text-dark" for="formGroupExampleInput2">Mật khẩu </label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i class="fa-solid fa-shield-halved"></i></span>
                                <input type="password" class="form-control border border-start-0"
                                    id="formGroupExampleInput2" placeholder="Mật khẩu" name="password">
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label text-dark" for="formGroupExampleInput2">Nhập lại mật khẩu </label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i class="fa-solid fa-shield-halved"></i></span>
                                <input type="password" class="form-control border border-start-0"
                                    id="formGroupExampleInput2" placeholder="Mật khẩu" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                    </div>
                    <div class="form-group mt-4 text-center fw-light" style="font-size: 15px">
                        <span>Đã có tài khoản?</span>
                        <a href="{{route('login')}}" class="text-success px-2">Đăng nhập ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
