@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Bộ lọc</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input type="text" placeholder="Từ khóa tìm kiếm" name="search_key">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Kinh nghiệm">Kinh nghiệm</option>
                                                <option value="1 năm">1 năm</option>
                                                <option value="2 năm">2 năm</option>
                                                <option value="3 năm">3 năm</option>
                                                <option value="5 năm">4 năm</option>
                                                <option value="5 năm">5 năm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Hình thức">Hình thức</option>
                                                <option value="Full time">Full time</option>
                                                <option value="Part time">Part time</option>
                                                <option value="Enternship">Enternship</option>
                                                <option value="Freelancer">Freelancer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide">
                                                <option data-display="Giới tính">Giới tính</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                                <option value="Nữ">Không yêu cầu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="reset_btn">
                            <button class="boxed-btn3 w-100" type="submit">Áp dụng</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Danh sách việc làm</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <select>
                                            <option data-display="Most Recent">Most Recent</option>
                                            <option value="1">Marketer</option>
                                            <option value="2">Wordpress </option>
                                            <option value="4">Designer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
                        <div class="row">
                            @foreach ($jobs as $job)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single_jobs white-bg d-flex justify-content-between">
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
                        {{ $jobs->links('layout.paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->
    @INCLUDE('layout.footer')
@endsection
