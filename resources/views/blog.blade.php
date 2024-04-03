@php
    use Illuminate\Support\Str;
@endphp

@extends('layout.main')
@section('content')
    @INCLUDE('layout.header')
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container mt-5">
                <div class="row">
                    @foreach($articles as $article)
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ url(Storage::url($article->thumbnail)) }}" alt="">
                                </div>

                                <div class="blog_details py-4 px-3">
                                    <a class="d-inline-block" href="{{route('detailblog',$article->id)}}">
                                        <h4 class="fw-bold fs-5">{{$article->title}}</h4>
                                    </a>
                                    <div class="summary-container mb-3">
                                      {{$article->summary}}
                                    </div>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa-regular fa-calendar-days"></i>{{$article->created_at}}</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>Google inks pact for new 35-storey office</h2>
                                    </a>
                                    <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                        he earth it first without heaven in place seed it second morning saying.</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2>Google inks pact for new 35-storey office</h2>
                                    </a>
                                    <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                        he earth it first without heaven in place seed it second morning saying.</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div> --}}
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
    @INCLUDE('layout.footer')
@endsection
