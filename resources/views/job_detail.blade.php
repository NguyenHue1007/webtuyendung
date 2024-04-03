@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/custom_inputfile.css') }}">
@endpush
@section('content')
    @INCLUDE('layout.header')
    <div class="job_details_area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb p-0">
                                    <img class="img-fluid" src="{{ url(Storage::url($job->employer->logo)) }}"
                                        alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4 class="fw-bold">{{ $job->title }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location location-width">
                                            <p><i class="fa-solid fa-location-dot icon-color"></i>{{ $job->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa-solid fa-clock icon-color"></i> {{ $job->type }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <form method="post" action="{{ route('user.savejob', $job->id) }}">
                                    @csrf
                                    <div class="apply_now">
                                        @if (Auth::check() && !$job->isSaved($job->id, Auth::user()->id))
                                            <form method="post" action="{{ route('user.savejob', $job->id) }}"
                                                class="p-0">
                                                @csrf
                                                <button type="submit" class="btn heart_mark"><i
                                                        class="ti-heart"></i></button>
                                            </form>
                                        @elseif(Auth::check() && $job->isSaved($job->id, Auth::user()->id))
                                            <button type="submit" class="btn heart_mark">
                                                <i class="fa-solid fa-heart"></i></button>
                                        @else
                                            <form method="post" action="{{ route('user.savejob', $job->id) }}"
                                                class="p-0">
                                                @csrf
                                                <button type="submit" class="btn heart_mark"><i
                                                        class="ti-heart"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="d-flex mb-3">
                            <span class="text-account fs-4">Chi tiết tin tuyển dụng</span>
                        </div>
                        <div class="single_wrap p-3 bg-light rounded">
                            <h4>Mô tả công việc</h4>
                            <div>
                                {!! $job->job_description !!}
                            </div>
                        </div>
                        <div class="single_wrap p-3 bg-light rounded">
                            <h4>Yêu cầu ứng viên</h4>
                            <div>
                                {!! $job->requirement !!}
                            </div>
                        </div>
                        <div class="single_wrap p-3 bg-light rounded">
                            <h4>Quyền lợi</h4>
                            <div>
                                {!! $job->benefit !!}
                            </div>
                        </div>
                        <div class="single_wrap p-3 bg-light rounded">
                            <h4>Địa điểm làm việc</h4>
                           {{ $job->location }}
                        </div>
                        <div class="single_wrap p-3 bg-light rounded">
                            <h4>Cách thức ứng tuyển</h4>
                            <p class="format-content">Ứng viên nộp hồ sơ trực tuyến bằng cách bấm <strong>Ứng tuyển
                                </strong>ngay dưới đây.</p>
                            <div class="pb-4 pt-2">
                                @if (Auth::check() && !$job->isApplied($job->id, Auth::user()->id))
                                    <a href="" class="boxed-btn3" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-apply"> <i class="fa-solid fa-paper-plane pe-2"></i>Ứng tuyển
                                        ngay</a>
                                @elseif(Auth::check() && $job->isApplied($job->id, Auth::user()->id))
                                    <p class="text-danger">Bạn đã ứng tuyển công việc này</p>
                                @else
                                    <a href="" class="boxed-btn3" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modal-apply"> <i class="fa-solid fa-paper-plane pe-2"></i>Ứng tuyển
                                        ngay</a>
                                @endif
                            </div>
                            <p>Hạn nộp hồ sơ: {{ $job->formatDeadline()}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="share_wrap mt-0 text-center">
                        <h4>{{$job->employer->company}}</h4>
                       <a class="icon-color fw-medium" href="{{route('profile_company',$job->employer->id)}}">Xem trang công ty
                        <i class="fa-solid fa-arrow-up-right-from-square icon-color ms-1"></i>
                    </a>
                       
                    </div>
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3 class="fw-bold mb-0">Thông tin chung</h3>
                        </div>
                        <div class="job_content">
                            <div class="premium-job-general-information__content--row mb-3">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Cấp bậc</div>
                                    <div class="general-information-data__value"> {{ $job->level }}</div>
                                </div>
                            </div>
                            <div class="premium-job-general-information__content--row mb-3">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Số lượng</div>
                                    <div class="general-information-data__value"> {{ $job->quantity }} người</div>
                                </div>
                            </div>
                            <div class="premium-job-general-information__content--row mb-3">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-venus-mars"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Giới tính</div>
                                    <div class="general-information-data__value"> {{ $job->gender }}</div>
                                </div>
                            </div>
                            <div class="premium-job-general-information__content--row mb-3">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-hourglass"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Kinh nghiệm</div>
                                    <div class="general-information-data__value"> {{ $job->experience }}</div>
                                </div>
                            </div>
                            <div class="premium-job-general-information__content--row mb-3">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Mức lương</div>
                                    <div class="general-information-data__value">{{$job->formatSalary() }}</div>
                                </div>
                            </div>
                            <div class="premium-job-general-information__content--row">
                                <div class="general-information-logo">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <div class="general-information-data">
                                    <div class="general-information-data__label">Thời hạn nộp hồ sơ</div>
                                    <div class="general-information-data__value">{{ $job->formatDeadline() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa-brands fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa-brands fa-google"></i></li>
                            <li><a href="#"> <i class="fa-brands fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-apply" tabindex="-1" aria-labelledby="exampleModalLabel-apply"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header px-4 py-4 border-0" style="box-shadow: 0 3px 4px 0 rgba(0,0,0,.03);">
                        <h3 class="modal-title" id="exampleModalLabel-apply">Ứng tuyển
                            <span class="icon-color">{{ $job->title }}</span>
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4">
                        <div class="apply-content_tab-title d-flex align-items-center">
                            <i class="fa-solid fa-folder-plus pe-1 icon-color fs-4"></i>
                            <span class="fw-medium">Tải CV để ứng tuyển</span>
                        </div>
                        <div class="apply_job_form white-bg p-0">
                            <form method="POST" action="{{ route('user.apply', $job->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label for="images" class="drop-container" id="dropcontainer">
                                                <span class="drop-title"><i
                                                        class="fa-solid fa-cloud-arrow-up fs-5 pe-1"></i>Tải lên CV từ máy
                                                    tính, chọn hoặc kéo thả</span>
                                                <input type="file" id="images" name="resume">
                                            </label>
                                            @error('resume')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input_field">
                                            <textarea class="@error('cover_letter') is-invalid @enderror"name="cover_letter" cols="30" rows="10"
                                                placeholder="Coverletter"></textarea>
                                            @error('cover_letter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit_btn">
                                            <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
    <!-- Modal -->
@endsection
