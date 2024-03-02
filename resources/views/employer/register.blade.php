@extends('layout.main')

@section('content')
    <div class="container mb-5">
        <div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-5">
            <div class="form-register">
                <h2 class ="text-primary mb-4">Đăng ký tài khoản nhà tuyển dụng</h2>
                <div class="d-flex mb-3">
                    <span class="text-account">Tài khoản</span>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold text-dark">Email đăng nhập <span
                                    class="text-danger">*</span> </label>
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
                                    <div class="ms-5">
                                        <label class="form-label fw-bold text-dark" for="formGroupExampleInput">Giới
                                            tính<span class="text-danger"> *</span> </label>
                                        <div>
                                            <div class="form-check form-check-inline me-5">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="flexRadioDefault1" value="Nam">
                                                <label class="form-check-label text-dark"
                                                    for="flexRadioDefault1">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="flexRadioDefault2" value="Nữ">
                                                <label class="form-check-label text-dark" for="flexRadioDefault2">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
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
                                <div class="col ms-5">
                                    <div class="ms-5">
                                        <label class="form-label fw-bold text-dark" for="formGroupExampleInput">Vị trí công
                                            tác<span class="text-danger"> *</span> </label>
                                        <div class="input-group bg-white">
                                            <span class="input-group-text bg-white input-icon" id="basic-addon1">
                                                <i class="fa-solid fa-user-tie"></i></span>
                                            <select class="form-control border-start-0"
                                                aria-label="Default select example" name="position">
                                                <option selected>Chọn vị trí công tác</option>
                                                <option value="Nhân viên">Nhân viên</option>
                                                <option value="Trưởng nhóm">Trưởng nhóm</option>
                                                <option value="Phó phòng">Phó phòng</option>
                                                <option value="Trưởng phòng">Trưởng phòng</option>
                                                <option value="Phó giám đốc">Phó giám đốc</option>
                                                <option value="Giám đốc">Giám đốc</option>
                                                <option value="Tổng giám đốc">Tổng giám đốc</option>
                                            </select>
                                        </div>
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
                                    <div class="ms-5">
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
