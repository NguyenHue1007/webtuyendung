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
                                <h3 class="fw-bold text-uppercase">Việc làm đã ứng tuyển</h3>
                            </div>
                            <div class="job_listing_area plus_padding p-0 bg-white">
                                <div class="job_lists m-0">
                                    <div class="row">
                                        @foreach ($applications as $application)
                                            <div class="col-lg-12 col-md-12">
                                                <div class="single_jobs d-flex justify-content-between ">
                                                    <div class="jobs_left d-flex align-items-center">
                                                        <div class="thumb p-0">
                                                            <img class="img-fluid"
                                                                src="{{ url(Storage::url($application->job->employer->logo)) }}"
                                                                alt="">
                                                        </div>
                                                        <div class="jobs_conetent">
                                                            <a href="{{route('detail',$application->job->id)}}">
                                                                <h4 class="fs-5 fw-medium">{{ $application->job->title }}</h4>
                                                            </a>
                                                            <div class="links_locat">
                                                                <div class="location">
                                                                    <p>{{ $application->job->employer->company }}
                                                                    </p>
                                                                </div>
                                                                <div class="location">
                                                                    <p>Thời gian ứng tuyển:
                                                                        {{ $application->created_at->format('d/m/Y H:i') }}
                                                                    </p>
                                                                </div>
                                                                <div class="location">
                                                                    <p>Trạng thái: {{ $application->status }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jobs_right">
                                                        <div class="d-flex justify-content-end">
                                                            <p class="icon-color fw-bold">
                                                                {{ $application->job->formatSalary() }}
                                                            </p>
                                                        </div>
                                                        <div class="apply_now align-items-end mt-5">
                                                            <a class="bg-link icon-color px-2 py-1 me-2 rounded-pill" href="{{route('chats',$application->job->employer->id)}}"> <i class="fa-solid fa-message"></i>
                                                                Nhắn tin
                                                            </a>
                                                            <a class="bg-link icon-color px-2 py-1 rounded-pill" href="{{route('view_cv',$application->id) }}"> <i class="fa-solid fa-eye"></i>
                                                                Xem CV
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
