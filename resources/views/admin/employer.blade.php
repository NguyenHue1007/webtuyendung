@EXTENDS('layout_admin.main')

@section('content')
    <div CLASS="card-body">
        <div CLASS="table-responsive bg-white rounded">
            <table CLASS="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class = "table-info">
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle ">Logo</th>
                        <th class="align-middle ">Name</th>
                        <th class="align-middle ">Email</th>
                        <th class="align-middle ">Phone</th>
                        <th class="align-middle ">Website</th>
                        <th class="align-middle ">Address</th>
                    </tr>
                </thead>

                <tbody>
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
                        {{-- <td class="align-middle ">
                            <button class = "btn"
                                onclick="event.preventDefault(); document.getElementById('delete-{{ $employer->id }}').submit();">
                                <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                            <form id="delete-{{ $employer->id }}"
                                action="{{ route('employer.destroy', $employer->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $employers->links('layout_admin.pagination') }}
    </div>
@endsection
