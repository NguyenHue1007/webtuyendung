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
                            <button class="boxed-btn3 px-5" type="submit"><i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="popular_search d-flex align-items-center">
                        <span>Popular Search:</span>
                        <ul>
                            <li><a href="#">Design & Creative</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Administration</a></li>
                            <li><a href="#">Teaching & Education</a></li>
                            <li><a href="#">Engineering</a></li>
                            <li><a href="#">Software & Web</a></li>
                            <li><a href="#">Telemarketing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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
                            <a href="{{route('jobsbycategory',$category->id)}}" class="cat-item">
                                <img src="{{ url(Storage::url($category->thumbnail)) }}" alt="{{ $category->title }}"
                                    width="80">
                                <h4 class="pt-3 mb-1">{{ $category->name }}</h4>
                                <p>{{count($category->jobs)}} việc làm</p>
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
                        <a href="{{route('jobs')}}" class="boxed-btn4">Xem thêm</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
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
                                            <h4>{{ $job->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
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
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Featured Candidates</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/1.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/2.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/3.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/4.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/5.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/6.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/7.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/8.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/9.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/9.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/10.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/3.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="img/candiateds/4.png" alt="">
                            </div>
                            <a href="#">
                                <h4>Markary Jondon</h4>
                            </a>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->

    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job d-flex justify-content-end">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/5.svg" alt="">
                        </div>
                        <a href="jobs.html">
                            <h3>Snack Studio</h3>
                        </a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/4.svg" alt="">
                        </div>
                        <a href="jobs.html">
                            <h3>Snack Studio</h3>
                        </a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/3.svg" alt="">
                        </div>
                        <a href="jobs.html">
                            <h3>Snack Studio</h3>
                        </a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/1.svg" alt="">
                        </div>
                        <a href="jobs.html">
                            <h3>Snack Studio</h3>
                        </a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->

    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                                programmes to help alleviate human suffering through animal welfare when
                                                people might depend on livestock as their only source of income or food.
                                            </p>
                                            <span>- Micky Mouse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class=" Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                                programmes to help alleviate human suffering through animal welfare when
                                                people might depend on livestock as their only source of income or food.
                                            </p>
                                            <span>- Micky Mouse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                                programmes to help alleviate human suffering through animal welfare when
                                                people might depend on livestock as their only source of income or food.
                                            </p>
                                            <span>- Micky Mouse</span>
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
    <!-- /testimonial_area  -->
    @INCLUDE('layout.footer')
@endsection
