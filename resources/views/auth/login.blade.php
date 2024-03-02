{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
                    <h3 class="text-primary fw-bold mb-2">Chào mừng bạn đã quay trở lại</h3>
                    <span style="font-size: 15px; color: #7f878f">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự nghiệp lý tưởng</span>
                </div>
                <form  method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-dark">Email</label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control border border-start-0" id="exampleInputEmail1"
                                    placeholder="Email" name="email">
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
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success w-100">Hoàn tất</button>
                    </div>
                    <div class="form-group mt-4 text-center fw-light" style="font-size: 15px">
                        <span>Chưa có tài khoản?</span>
                        <a href="" class="text-success px-2">Đăng ký ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

