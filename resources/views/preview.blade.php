@extends('layout.main')

@section('content')
    @INCLUDE('layout.header')
    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container d-flex justify-content-center">
            <iframe src="{{ url(Storage::url($application->resume)) }}" style="width: 800px; height: 100vh"></iframe>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
