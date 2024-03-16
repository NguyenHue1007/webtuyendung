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
                                <h3 class="fw-bold text-uppercase">Trang cá nhân</h3>
                            </div>
                            <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="upload-btn-wrapper">
                                            <button class="btn-logo"><i class="fa-solid fa-upload pe-2"></i>Chọn ảnh đại
                                                diện</button>
                                            <input type="file" name="avatar" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Họ tên</label>
                                            <input type="text" class="form-control" placeholder="Họ tên" value= "{{$user->name}}"
                                                name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="d-flex flex-column">
                                            <label>Giới tính</label>
                                            <div class="mt-2">
                                                <div class="form-check form-check-inline me-5">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        value="Nam"  <?php echo ($user->gender === 'Nam') ? 'checked' : ''; ?>>
                                                    <label class="form-check-label text-dark">Nam</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        value="Nữ"  <?php echo ($user->gender === 'Nữ') ? 'checked' : ''; ?>>
                                                    <label class="form-check-label text-dark">Nữ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Tuổi</label>
                                            <input type="text" class="form-control" placeholder="Tuổi" value= "{{$user->age}}"
                                                name="age">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="email" value="{{$user->email}}"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" placeholder="Số điện thoại"
                                                name="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address"
                                                value="{{$user->address}}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"class="btn btn-success py-2 px-3">Lưu thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
