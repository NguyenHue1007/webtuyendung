@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center vh-100">
            <div class="col" style="max-width: 600px">
                <div class="mb-4">
                    <h3 class="text-primary fw-bold mb-2">Chào mừng bạn đã quay trở lại</h3>
                    <span style="font-size: 15px; color: #7f878f">Cùng xây dựng một hồ sơ nổi bật và nhận được các cơ hội sự nghiệp lý tưởng</span>
                </div>
                <form action="">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label text-dark">Email</label>
                            <div class="input-group bg-white">
                                <span class="input-group-text bg-white input-icon" id="basic-addon1"><i
                                        class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control border border-start-0" id="exampleInputEmail1"
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
                                    id="formGroupExampleInput2" placeholder="Mật khẩu">
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
