@EXTENDS('layout_admin.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách nhà tuyển dụng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle ">Logo</th>
                            <th class="align-middle ">Name</th>
                            <th class="align-middle ">Email</th>
                            <th class="align-middle ">Phone</th>
                            <th class="align-middle ">Website</th>
                            <th class="align-middle ">Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($employers as $employer)
                            <tr>
                                <td class="align-middle text-center">{{ $employer->id }}</td>
                                <td class="align-middle ">
                                    <img src="{{ url(Storage::url($employer->logo)) }}" alt="{{ $employer->company }}"
                                        width="70">
                                </td>
                                <td class="align-middle ">{{ $employer->company }}</td>
                                <td class="align-middle ">{{ $employer->email }}</td>
                                <td class="align-middle ">{{ $employer->phone }}</td>
                                <td class="align-middle ">{{ $employer->website }}</td>
                                <td class="align-middle ">{{ $employer->city}} {{ $employer->distric}} {{ $employer->commune}}</td>
                                <td class="align-middle ">
                                    <button class = "btn"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $employer->id }}').submit();">
                                        <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                                    <form id="delete-{{ $employer->id }}"
                                        action="{{ route('employer.destroy', $employer->id) }}" method="POST"
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
                {{ $employers->links('layout_admin.pagination') }}
            </div>
        </div>
    </div>
@endsection
