@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    @INCLUDE('layout.slider')
    <!-- catagory_area -->
    <div class="catagory_area">
        <div class="container">
            <form action="{{ route('search') }}" method="GET">
                <div class="row cat_search">
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <input type="text" placeholder="Vị trí tuyển dụng" name="search_key">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <select class="wide" name="city" id="city">
                                <option data-display="Tất cả tỉnh thành">Tất cả tỉnh thành</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_input">
                            <select class="wide" name="type">
                                <option data-display="Tất cả hình thức">Tất cả hình thức</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                                <option value="Enternship">Enternship</option>
                                <option value="Freelancer">Freelancer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="job_btn">
                            <button class="boxed-btn3 px-5" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/ catagory_area -->

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section_title text-center mb-40">
                                <h3>Danh mục việc làm</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row multiple-items">
                @foreach ($categories as $category)
                    <div class="col">
                        <div
                            class="single_catagory text-center d-flex flex-column align-items-center justify-content-center m-3">
                            <a href="{{ route('jobsbycategory', $category->id) }}" class="cat-item">
                                <img src="{{ url(Storage::url($category->thumbnail)) }}" alt="{{ $category->title }}"
                                    width="80">
                                <h4 class="pt-3 mb-1">{{ $category->name }}</h4>
                                <p>{{ count($category->jobs) }} việc làm</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Danh sách việc làm</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job d-flex justify-content-end">
                        <a href="{{ route('jobs') }}" class="boxed-btn4">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @foreach ($jobs as $job)
                        <div class="col-lg-4 col-md-4">
                            <div class="single_jobs white-bg p-3">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="pe-3">
                                        <img class="img-fluid" src="{{ url(Storage::url($job->employer->logo)) }}"
                                            width="74" height="74" alt="">
                                    </div>
                                    <div class="jobs_conetent job-infor">
                                        <div class="">
                                            <a href="{{ route('detail', $job->id) }}">
                                                <h5 class="mb-0 max-lines">{{ $job->title }}</h5>
                                            </a>
                                        </div>
                                        <div class="company_name">
                                            <a href="">
                                                <p class="max-lines">{{ $job->employer->company }}</p>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="links_locat d-flex">
                                                <div class="salary">
                                                    <p class="me-1">
                                                        {{ $job->formatSalary() }}
                                                    </p>
                                                </div>
                                                <div class="address">
                                                    <p>{{ $job->location }}</p>
                                                </div>
                                            </div>
                                            <div class="apply_now">
                                                @if (Auth::check() && !$job->isSaved($job->id, Auth::user()->id))
                                                    <form method="post" action="{{ route('user.savejob', $job->id) }}"
                                                        class="p-0">
                                                        @csrf
                                                        <button type="submit" class="btn heart_mark px-0"><i
                                                                class="ti-heart icon-color px-0"></i></button>
                                                    </form>
                                                @elseif(Auth::check() && $job->isSaved($job->id, Auth::user()->id))
                                                        <button type="submit" class="btn heart_mark px-0">
                                                            <i class="fa-solid fa-heart icon-color"></i></button>
                                                @else
                                                    <form method="post" action="{{ route('user.savejob', $job->id) }}"
                                                        class="p-0">
                                                        @csrf
                                                        <button type="submit" class="btn heart_mark px-0"><i
                                                                class="ti-heart icon-color"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Danh sách công ty</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        @foreach($employers as $employer)
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{ url(Storage::url($employer->logo)) }}" alt="">
                            </div>
                            <a href="{{route('profile_company',$employer->id)}}">
                                <h4>{{$employer->company}}</h4>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
