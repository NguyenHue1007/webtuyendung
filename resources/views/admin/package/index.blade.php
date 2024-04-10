@EXTENDS('layout_admin.main')

@section('content')
    <div class="mb-3">
            <a href="{{route('package.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="fas fa-plus"></i> Thêm gói dịch vụ</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách gói dịch vụ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle ">Name</th>
                            <th class="align-middle ">Description</th>
                            <th class="align-middle ">Max jobs</th>
                            <th class="align-middle ">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($packages as $package)
                            <tr>
                                <td class="align-middle text-center">{{ $package->id }}</td>
                                <td class="align-middle ">{{ $package->name }}</td>
                                <td class="align-middle ">{{ $package->description }}</td>
                                <td class="align-middle ">{{ $package->max_jobs }}</td>
                                <td class="align-middle ">{{ $package->price }}</td>
                                <td class="align-middle ">
                                    <a href="{{ route('package.edit', $package->id) }}">
                                        <i class="fas fa-edit"></i></a>
                                </td>
                                <td class="align-middle ">
                                    <button class = "btn"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $package->id }}').submit();">
                                        <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                                    <form id="delete-{{ $package->id }}"
                                        action="{{ route('package.destroy', $package->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                {{-- {{ $categories->links('layout_admin.pagination') }} --}}
            </div>
        </div>
    </div>
@endsection
