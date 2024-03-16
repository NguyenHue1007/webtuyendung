@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/modal_delete.css') }}">
@endpush
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
                                <h3 class="fw-bold text-uppercase">Danh sách tin đăng</h3>
                            </div>
                            <div class="mb-4 fw-bold d-flex align-items-center justify-content-between">
                                <span>Thống kê tin: </span>
                                <div class="bg-primary-subtle px-5 py-3 d-flex flex-column align-items-center rounded">
                                    <span>Tổng số tin đăng</span>
                                    <span class="pt-1">{{ count($jobs) }}</span>
                                </div>
                                <div class="bg-info-subtle px-5 py-3 d-flex flex-column align-items-center rounded">
                                    <span>Tin đang hoạt động</span>
                                    <span class="pt-1">{{ $activeJobs }}</span>
                                </div>
                                <div class="bg-danger-subtle px-5 py-3 d-flex flex-column align-items-center rounded">
                                    <span>Tin đã hết hạn</span>
                                    <span class="pt-1">{{ $experedJobs }}</span>
                                </div>
                            </div>
                            <table class="table-job-bx cv-manager company-manage-job w-100">
                                <thead>
                                    <tr>
                                        <th>Tên tin đăng</th>
                                        <th class="text-center">Lượt nộp</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $job)
                                        <tr>
                                            <td class="job-name">
                                                <p class="mb-1">{{ $job->title }}</p>
                                                <ul class="job-post-info d-flex">
                                                    <li class="me-3">
                                                        <i class="fa-solid fa-calendar-days icon-color pe-1"></i>
                                                        <span>{{ $job->created_at->format('d/m/Y H:i') }}</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-bookmark pe-1 icon-color"></i>
                                                        <span>{{ $job->type }}</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-center">{{ count($job->applications) }}</td>
                                            @if ($job->isActive())
                                                <td class="text-center text-primary">Đang hoạt động</td>
                                            @else
                                                <td class="text-center text-danger"><i class="fa-solid fa-circle-info"></i>
                                                    Đã hết hạn</td>
                                            @endif
                                            <td class="job-links">
                                                <a type="button" class="view-job" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1{{ $job->id }}">
                                                    <i class="fa-solid fa-eye view"></i>
                                                </a>
                                                <a type="button" class="edit-job" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal2{{ $job->id }}">
                                                    <i class="fa-solid fa-pen-to-square edit"></i>
                                                </a>
                                                <a type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal3{{ $job->id }}">
                                                    <i class="fa-solid fa-trash delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <script>
            @foreach ($jobs as $job)
                ClassicEditor
                    .create(document.querySelector('#editor_description{{ $job->id }}'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#editor_requirement{{ $job->id }}'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#editor_benefit{{ $job->id }}'))
                    .catch(error => {
                        console.error(error);
                    });
            @endforeach
        </script>
    @endpush
    @INCLUDE('layout.footer')
@endsection

<!-- Button trigger modal -->

<!-- Modal view-->
@foreach ($jobs as $job)
    <div class="modal fade" id="exampleModal1{{ $job->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header px-4 py-3 primary-bg">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">{{ $job->title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ps-4">
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Cấp bậc:</strong></p>
                            <p><strong>Giới tính:</strong></p>
                            <p><strong>Số lượng:</strong></p>
                            <p><strong>Mức lương:</strong></p>
                            <p><strong>Kinh nghiệm:</strong></p>
                            <p><strong>Hình thức làm việc:</strong></p>
                            <p><strong>Địa điểm làm việc:</strong></p>
                            <p><strong>Thời hạn nộp hồ sơ:</strong></p>

                        </div>
                        <div class="col-9">
                            <p>{{ $job->level }}</p>
                            <p>{{ $job->gender }}</p>
                            <p>{{ $job->quantity }}</p>
                            <p>{{ $job->min_salary }}đ - {{ $job->max_salary }}đ</p>
                            <p>{{ $job->experience }}</p>
                            <p>{{ $job->type }}</p>
                            <p> {{ $job->location }}</p>
                            <p> {{ $job->deadline }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Mô tả công việc:</strong></p>
                        </div>
                        <div class="col-9">
                            <p class="format-content" id="job-description"> {{ $job->job_description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Yêu cầu:</strong></p>
                        </div>
                        <div class="col-9">
                            <p class="format-content" id="job-requirement"> {{ $job->requirement }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <p><strong>Quyền lợi:</strong></p>
                        </div>
                        <div class="col-9">
                            <p class="format-content" id="job-benefit"> {{ $job->benefit }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- Modal edit-->
@foreach ($jobs as $job)
    <div class="modal fade" id="exampleModal2{{ $job->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header px-4 py-3 primary-bg">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Cập nhật công việc</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="job-bx submit-resume job-bx-edit">
                        <form method="POST" action="{{ route('employer.update_job', $job->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Tiêu đề công việc</label>
                                        <input type="text" class="form-control" placeholder="Enter Job Title"
                                            name="title" value="{{ $job->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <label>Thể loại</label>
                                    <div class="input-group bg-white">
                                        <select class="form-control pt-1" aria-label="Default select example"
                                            name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $job->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" class="form-control" placeholder="Enter quantity"
                                            name="quantity" value="{{ $job->quantity }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Vị trí công việc</label>
                                        <input type="text" class="form-control" placeholder="Enter level"
                                            name="level" value="{{ $job->level }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <label>Giới tính</label>
                                    <div class="input-group bg-white">
                                        <select class="form-control pt-1" aria-label="Default select example"
                                            name="gender">
                                            <option value="Nam" {{ $job->gender == 'Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nữ" {{ $job->gender == 'Nữ' ? 'selected' : '' }}>Nữ
                                            </option>
                                            <option value="Không yêu cầu"
                                                {{ $job->gender == 'Không yêu cầu' ? 'selected' : '' }}>Không yêu cầu
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <label>Hình thức làm việc</label>
                                    <div class="input-group bg-white">
                                        <select class="form-control pt-1" aria-label="Default select example"
                                            name="type">
                                            <option value="Full time"
                                                {{ $job->type == 'Full time' ? 'selected' : '' }}>Full time</option>
                                            <option value="Part time"
                                                {{ $job->type == 'Part time' ? 'selected' : '' }}>Part time</option>
                                            <option value="Enternship"
                                                {{ $job->type == 'Enternship' ? 'selected' : '' }}>Enternship</option>
                                            <option
                                                value="Freelance"{{ $job->type == 'Freelance' ? 'selected' : '' }}>
                                                Freelance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Kinh nghiệm</label>
                                        <input type="text" class="form-control" placeholder="1 Year"
                                            name="experience" value="{{ $job->experience }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Mức lương tối thiểu ($):</label>
                                        <input type="number" class="form-control" placeholder="5000000"
                                            name="min_salary" value="{{ $job->min_salary }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="form-group">
                                        <label>Mức lương tối đa ($):</label>
                                        <input type="number" class="form-control" placeholder="10000000"
                                            name="max-salary" value="{{ $job->max_salary }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Địa điểm làm việc</label>
                                        <input type="text" class="form-control" placeholder="New Yord"
                                            name="location" value="{{ $job->location }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Hạn nộp hồ sơ</label>
                                        <input type="date" class="form-control" placeholder="01/01/2024"
                                            name="deadline" value="{{ $job->deadline }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Mô tả công việc</label>
                                        <div class="form-floating">
                                            <textarea class="form-control line-text" rows="10" name="job_description"
                                                id="editor_description{{ $job->id }}">{{ $job->job_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Yêu cầu ứng viên</label>
                                        <div class="form-floating">
                                            <textarea class="form-control line-text" rows="10"
                                                name="requirement"id="editor_requirement{{ $job->id }}">{{ $job->requirement }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 mb-4">
                                    <div class="form-group">
                                        <label>Quyền lợi</label>
                                        <div class="form-floating">
                                            <textarea class="form-control line-text" rows="10" name="benefit"id="editor_benefit{{ $job->id }}">{{ $job->benefit }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success py-2 px-4 mt-4 mb-3 float-end">Lưu thay
                                đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- Modal delete-->
@foreach ($jobs as $job)
    <div class="modal fade" id="exampleModal3{{ $job->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fa-solid fa-xmark material-icons"></i>
                    </div>
                    <h4 class="modal-title w-100">Bạn có chắc không?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có thực sự muốn xóa những bản ghi này? Quá trình này không thể được hoàn tác.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button class="btn btn-danger p-0"
                        onclick="event.preventDefault(); document.getElementById('delete-{{ $job->id }}').submit();">Xóa</button>
                    <form id="delete-{{ $job->id }}" action="{{ route('employer.destroy_job', $job->id) }}"
                        method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach



