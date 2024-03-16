@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{ url('css/modal_delete.css') }}">
@endpush
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
                        <div class="job-bx submit-resume">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">Danh sách ứng viên</h3>
                            </div>
                            <form method="POST" action="{{ route('employer.update_status') }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 d-flex justify-content-end">
                                    <button type="submit" class="boxed-btn3 btn-update_status py-2">Lưu thay đổi</button>
                                </div>
                                <table class="table-job-bx cv-manager company-manage-job w-100 fs-6">
                                    <thead>
                                        <tr>

                                            <th>Tên ứng viên</th>
                                            <th>Vị trí ứng tuyển</th>
                                            <th class="text-center">Thời gian nộp</th>
                                            <th class="text-center">Hồ sơ</th>
                                            <th class="text-center">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                            @foreach ($job->applications as $item)
                                                <tr>
                                                    <td class="job-name">
                                                        <p class="mb-1">{{ $item->user->name }}</p>
                                                    </td>
                                                    <td style="max-width:200px">
                                                        <p class="text-dark mb-1">{{ $job->title }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-dark mb-1">{{ $item->created_at->format('d/m/Y') }}
                                                        </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{route('view_cv', $item->id)}}" class="bg-info-subtle rounded-pill px-2 py-1"><i
                                                                class="fa-regular fa-eye"></i> Xem CV</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <select class="w-100" name="status[{{$item->id}}]">
                                                            <option value="Chờ xử lý" {{ $item->status == 'Chờ xử lý' ? 'selected' : '' }}>Chờ xử lý</option>
                                                            <option value="Đã xem"  {{ $item->status == 'Đã xem' ? 'selected' : '' }}>Đã xem</option>
                                                            <option value="Phỏng vấn"  {{ $item->status == 'Phỏng vấn' ? 'selected' : '' }}>Phỏng vấn</option>
                                                            <option value="Chấp nhận"  {{ $item->status == 'Chấp nhận' ? 'selected' : '' }}>Chấp nhận</option>
                                                            <option value="Từ chối"  {{ $item->status == 'Từ chối' ? 'selected' : '' }}>Từ chối</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @INCLUDE('layout.footer')
@endsection
