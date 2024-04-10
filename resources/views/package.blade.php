@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/package.css') }}">
@endpush
@section('content')
    @INCLUDE('layout.header')
    <div id="mainCoantiner" class=>
        <!--dust particel-->
        <div class="margin-body">

            <div>
                <div class="starsec"></div>
                <div class="starthird"></div>
                <div class="starfourth"></div>
                <div class="starfifth"></div>
            </div>
            <!--Dust particle end--->

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <div class="title-h1 text-center"><span><span class="light">pricing </span> table</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="pricing-column-wrapper me-3">
                    <div class="pricing-column">
                        <div class="pricing-price-row">
                            <div class="pricing-price-wrapper">
                                <div class="pricing-price">
                                    <div class="pricing-cost">$10</div>
                                    <div class="time">Per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-row-title">
                            <div class="pricing_row_title">Small</div>
                        </div>
                        <figure class="pricing-row">Tối đa 5 bài tuyển dụng</figure>
                        <figure class="pricing-row">Độ ưu tiên thấp</figure>
                        <figure class="pricing-row">Hỗ trợ 24/7</figure>
                        <div class="pricing-footer">
                            <div class="gem-button-container gem-button-position-center"><a href="#"
                                    class="gem-button gem-green">Mua ngay</a></div>
                        </div>
                    </div>
                </div>
                <div class="pricing-column-wrapper me-3">
                    <div class="pricing-column">
                        <div class="pricing-price-row">
                            <div class="pricing-price-wrapper">
                                <div class="pricing-price">
                                    <div class="pricing-cost">$45</div>
                                    <div class="time">Per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-row-title">
                            <div class="pricing_row_title">Medium</div>
                        </div>
                        <figure class="pricing-row">Tối đa 20 bài tuyển dụng</figure>
                        <figure class="pricing-row">Độ ưu tiên trung bình</figure>
                        <figure class="pricing-row">Hỗ trợ 24/7</figure>
                        <div class="pricing-footer">
                            <div class="gem-button-container gem-button-position-center"><a
                                    class="gem-button gem-purpel">Mua ngay</a></div>
                        </div>
                    </div>
                </div>
                <div class="pricing-column-wrapper me-3">
                    <div class="pricing-column">
                        <div class="pricing-price-row">
                            <div class="pricing-price-wrapper">
                                <div class="pricing-price">
                                    <div class="pricing-cost">$99</div>
                                    <div class="time">Per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-row-title">
                            <div class="pricing_row_title">Large</div>
                        </div>
                        <figure class="pricing-row">Tối đa 50 bài tuyển dụng</figure>
                        <figure class="pricing-row">Độ ưu tiên cao</figure>
                        <figure class="pricing-row">Hỗ trợ 24/7</figure>
                        <div class="pricing-footer">
                            <div class="gem-button-container gem-button-position-center">
                                <a class="gem-button gem-orange">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-3 col-md-3 pricing-column-wrapper">
                    <div class="pricing-column">
                        <div class="pricing-price-row">
                            <div class="pricing-price-wrapper">
                                <div class="pricing-price">
                                    <div style=" " class="pricing-cost">$145</div>
                                    <div class="time" style="display:inline-block;">Per Month</div>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-row-title">
                            <div class="pricing_row_title">large</div>
                        </div>
                        <figure class="pricing-row">Photo sharing school</figure>
                        <figure class="pricing-row"><span style="color: #5f727f;">Drop out ramen hustle</span></figure>
                        <figure class="pricing-row"><span style="color: #5f727f;">Crush revenue traction</span></figure>
                        <figure class="pricing-row">Crush revenue traction</figure>
                        <figure class="pricing-row">User base minimum</figure>
                        <figure class="pricing-row strike">Lorem ipsum dolor</figure>
                        <div class="pricing-footer">
                            <div class="gem-button-container gem-button-position-center"><a
                                    class="gem-button gem-yellow">Mua ngay</a></div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
