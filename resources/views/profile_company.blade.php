@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <div class="bg-light">
        <div class="page-content">
            <div class="container company-cover">
                <div class="company-cover-inner">
                    <div class="cover-wrapper">
                        <img src="{{ url('img/company_cover_1.jpg') }}">
                    </div>
                    <div class="company-logo">
                        <div>
                            <img  class="company-image-logo"
                                src="{{ url(Storage::url($employer->logo)) }}">
                        </div>
                        <div class="company-detail-overview">
                            <div class="box-detail">
                                <h1>{{$employer->company}}</h1>
                                <div class="company-subdetail">
                                    <div class="company-subdetail-info">
                                        <span class="company-subdetail-info-icon">
                                            <i class="fa-solid fa-globe"></i>
                                        </span>
                                        <span class="company-subdetail-info-text">{{$employer->website}}</span>
                                    </div>
                                    <div class="company-subdetail-info">
                                        <span class="company-subdetail-info-icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <span class="company-subdetail-info-text">{{$employer->phone}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pb-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="company-info">
                            <h2 class="title">Giới thiệu công ty</h2>
                            <div class="box-body bg-white">
                                <p class="format-content">{{$employer->description}}</p>
                            </div>
                        </div>
                        <div class="job-listing mt-4">
                            <div class="job-listing__header">
                                <h2 class="title">Tuyển dụng</h2>
                            </div>
                            <div class="box-body">
                                <div class="job_listing_area plus_padding p-0 bg-white">
                                    <div class="job_lists m-0">
                                        <div class="row py-4">
                                            @foreach ($employer->jobs as $job)
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="single_jobs white-bg d-flex justify-content-between mx-3" style="background-color: #f2fbf6;">
                                                        <div class="jobs_left d-flex align-items-center">
                                                            <div class="thumb p-0">
                                                                <img class="img-fluid" src="{{ url(Storage::url($job->employer->logo)) }}"
                                                                    alt="">
                                                            </div>
                                                            <div class="jobs_conetent">
                                                                <a href="{{ route('detail', $job->id) }}">
                                                                    <h5>{{ $job->title }}</h5>
                                                                </a>
                                                                <div class="links_locat d-flex align-items-center">
                                                                    <div class="location" style="max-width: 295px">
                                                                        <p><i class="fa-solid fa-location-dot icon-color"></i>{{ $job->location }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="location">
                                                                        <p> <i class="fa-solid fa-clock icon-color"></i> {{ $job->type }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="jobs_right">
                                                            <div class="apply_now d-flex">
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
                                                                @if (Auth::check() && !$job->isApplied($job->id, Auth::user()->id))
                                                                    <a href="{{ route('detail', ['job' => $job->id]) }}?showModal=true"
                                                                        class="boxed-btn3">Ứng tuyển</a>
                                                                @elseif(Auth::check() && $job->isApplied($job->id, Auth::user()->id))
                                                                    <p class="text-danger">Đã ứng tuyển</p>
                                                                @else
                                                                    <a href="{{ route('detail', ['job' => $job->id]) }}?showModal=true"
                                                                        class="boxed-btn3">Ứng tuyển</a>
                                                                @endif
                                                            </div>
                                                            <div class="date">
                                                                <p>Hạn nộp: {{ $job->formatDeadline()}}</p>
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
                    <div class="col-md-4">
                        <div class="company-contact">
                            <h2 class="title">Thông tin liên hệ</h2>
                            <div class="box-body bg-white">
                                <div class="box-caption">
                                    <i class="fa-solid fa-location-dot icon-color me-2"></i>
                                    <span>Địa chỉ công ty</span>
                                </div>
                                <div>
                                   <span>{{$employer->commune}}, {{$employer->distric}}, {{$employer->city}}</span>
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
