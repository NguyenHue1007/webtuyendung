@extends('layout.main')

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
                        <div class="job-bx submit-resume" style="min-height: 700px">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">Mua dịch vụ</h3>
                            </div>
                            <div class="row list-service">
                                <h5 class="text-danger mb-3">Nhà tuyển dụng chỉ được phép mua và kích hoạt duy nhất một gói</h5>
                                @foreach ($packages as $package)
                                <div class="col-lg-4 col-md-4 service mb-4">
                                    <div class="detail-service p-3">
                                        <h4 class="text-uppercase fw-bold">{{$package->name}}</h4>
                                        <p class="fw-bold fs-5 icon-color">{{$package->price}}VND<span class="text-danger">*</span></p>
                                        <p class="text-dark" style="min-height: 50px; line-height: 20px; font-size: 15px">{{$package->description}}</p>
                                        <a href="{{route('employer.show_form_payment',$package->id)}}" class="boxed-btn3 py-1">Mua ngay</a>
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
    @INCLUDE('layout.footer')
@endsection
