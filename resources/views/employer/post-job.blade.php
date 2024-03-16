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
                                <h3 class="fw-bold text-uppercase">Tạo tin tuyển dụng</h3>
                            </div>
                            <form method="POST" action="{{ route('employer.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Tiêu đề công việc</label>
                                            <input type="text" class="form-control" placeholder="Enter Job Title"
                                                name="title">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Thể loại</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="number" class="form-control" placeholder="Enter quantity"
                                                name="quantity">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Vị trí tuyển dụng</label>
                                            <input type="text" class="form-control" placeholder="Enter level"
                                                name="level">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Giới tính</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="gender">
                                                <option value="Nam" selected>Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Không yêu cầu">Không yêu cầu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>Hình thức làm việc</label>
                                        <div class="input-group bg-white">
                                            <select class="form-control pt-1" aria-label="Default select example"
                                                name="type">
                                                <option value="Full time" selected>Full time</option>
                                                <option value="Part time">Part time</option>
                                                <option value="Enternship">Enternship</option>
                                                <option value="Freelance">Freelance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Kinh nghiệm</label>
                                            <input type="text" class="form-control" placeholder="1 Year"
                                                name="experience">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Mức lương tối thiểu ($):</label>
                                            <input type="number" class="form-control" placeholder="5000000"
                                                name="min_salary">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <div class="form-group">
                                            <label>Mức lương tối đa ($):</label>
                                            <input type="number" class="form-control" placeholder="10000000"
                                                name="max-salary">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Địa điểm làm việc</label>
                                            <input type="text" class="form-control" placeholder="New Yord"
                                                name="location">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Hạn nộp hồ sơ</label>
                                            <input type="date" class="form-control" placeholder="01/01/2024"
                                                name="deadline">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Mô tả công việc</label>
                                            <div class="form-floating">
                                                <textarea class="form-control line-text" id="editor1" name="job_description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Yêu cầu ứng viên</label>
                                            <div class="form-floating">
                                                <textarea class="form-control line-text" rows="10" id="editor2" name="requirement"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="form-group">
                                            <label>Quyền lợi</label>
                                            <div class="form-floating">
                                                <textarea class="form-control line-text" rows="10" id="editor3"name="benefit"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success py-2 px-4 mt-4">Đăng tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .then(editor1 => {
                    console.log(editor1);
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#editor2'))
                .then(editor2 => {
                    console.log(editor2);
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#editor3'))
                .then(editor3 => {
                    console.log(editor3);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

    @INCLUDE('layout.footer')
@endsection
