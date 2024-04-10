@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/payment.css') }}">
@endpush
@section('content')
    @INCLUDE('layout.header')
    <div class="container pb-5" style="padding-top: 140px">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <form method="POST" action="{{route('employer.package_subscription')}}">
                @csrf
                <div class="row gx-3">
                    <input type="hidden" value="{{ $package->id }}" name="package_id">
                    <input type="hidden" value="{{ $package->price }}" name="package_price">
                    <input type="hidden" value="{{ $package->max_jobs }}" name="package_max_jobs">
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Person Name</p>
                            <input class="form-control mb-3 text-uppercase" type="text" placeholder="NGUYEN VAN A">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Card Number</p>
                            <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">Expiry</p>
                            <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <p class="text mb-1">CVV/CVC</p>
                            <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="btn btn-primary mb-3">
                            <button class="btn bg-transparent text-white" type="submit"><span class="ps-3">Payment Now</span></button>
                            <span class="fas fa-arrow-right"></span>
                        </div>
                    </div>
            </form>
        </div>
        </form>
    </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
