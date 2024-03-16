@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <div class="page-content">
        <div class="section-full">
            <div class="container-content mt-5 mb-5">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        @INCLUDE('layout.sidebar_jobseeker')
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="job-bx submit-resume">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">Thay đổi mật khẩu</h3>
                            </div>
                            <form method="POST" action="{{ route('user.change_password', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Mật khẩu cũ</label>
                                            <input type="text"
                                                class="form-control @error('old_password') is-invalid @enderror" placeholder="Enter old password"
                                                name="old_password">
                                            @error('old_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"placeholder="Enter new password"
                                                name="new_password">
                                            @error('new_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"placeholder="Enter confirm password"
                                                name="password_confirmation">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success py-2 px-4 mt-2">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
