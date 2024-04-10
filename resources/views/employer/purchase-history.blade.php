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
                        <div class="job-bx submit-resume">
                            <div class="job-bx-title">
                                <h3 class="fw-bold text-uppercase">Lịch sử đơn hàng</h3>
                            </div>
                            <table class="table-job-bx cv-manager company-manage-job w-100">
                                <thead>
                                    <tr>
                                        <th>Tên gói</th>
                                        <th class="text-center">Ngày đăng ký</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Trạng Thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                @foreach ($packages as $package)
                                    <tr>
                                        <td class="fw-bold">{{ $package->package->name }}</td>
                                        <td class="text-center">{{ $package->created_at }}</td>
                                        <td class="text-center">{{ $package->price }} VND</td>
                                        @if ($package->status === 'on')
                                            <td class="text-center icon-color">Đang sử dụng</td>
                                            <form method="POST"
                                                action="{{ route('employer.delete_package_subscription', $package->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <td class="text-center">
                                                    <button class="btn btn-danger px-3 py-1 border-0" type="submit"><i
                                                            class="fa-solid fa-trash"></i> Hủy gói</button>
                                                </td>
                                            </form>
                                        @else
                                            <td class="text-center text-danger"><i class="fa-solid fa-circle-info"></i> Đã hết hạn</td>
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
