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
                                <h3 class="fw-bold text-uppercase">Việc làm đã lưu</h3>
                            </div>
                            <div class="job_listing_area plus_padding p-0 bg-white">
                                <div class="job_lists m-0">
                                    <div class="row">
                                        @foreach ($favoriteJobs as $favoriteJob)
                                            <div class="col-lg-12 col-md-12">
                                                <div class="single_jobs d-flex justify-content-between ">
                                                    <div class="jobs_left d-flex align-items-center">
                                                        <div class="thumb p-0">
                                                            <img class="img-fluid"
                                                                src="{{ url(Storage::url($favoriteJob->job->employer->logo)) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="jobs_conetent">
                                                            <a href="">
                                                                <h4 class="fs-5 fw-medium">
                                                                    {{ $favoriteJob->job->title }}
                                                                </h4>
                                                            </a>
                                                            <div class="links_locat">
                                                                <div class="location">
                                                                    <p>
                                                                        {{ $favoriteJob->job->employer->company }}
                                                                    </p>
                                                                </div>
                                                                <div class="location">
                                                                    <p>Đã lưu:
                                                                        {{ $favoriteJob->created_at->format('d/m/Y H:i') }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jobs_right">
                                                        <div class="d-flex justify-content-end">
                                                            <p class="icon-color fw-bold">
                                                                {{ $favoriteJob->job->formatSalary() }}
                                                            </p>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('user.delete_favoritejob', $favoriteJob->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="apply_now d-flex align-items-end mt-4">
                                                                <a href="{{ route('detail', ['job' => $favoriteJob->job->id]) }}?showModal=true"
                                                                    class="boxed-btn3 px-3 py-1 me-2">Ứng tuyển</a>
                                                                <button class="btn bg-secondary-subtle px-3 py-1 border-0"
                                                                    type="submit"><i class="fa-solid fa-trash"></i> Bỏ
                                                                    lưu</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="pagination_wrap">
                                                <ul>
                                                    <li><a href="#"> <i class="ti-angle-left"></i> </a></li>
                                                    <li><a href="#"><span>01</span></a></li>
                                                    <li><a href="#"><span>02</span></a></li>
                                                    <li><a href="#"> <i class="ti-angle-right"></i> </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
