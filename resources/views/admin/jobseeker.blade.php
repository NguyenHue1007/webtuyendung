@EXTENDS('layout_admin.main')

@section('content')
    <div CLASS="card-body">
        <div CLASS="table-responsive bg-white rounded">
            <table CLASS="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class = "table-info">
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle ">Avatar</th>
                        <th class="align-middle ">Name</th>
                        <th class="align-middle ">Gender</th>
                        <th class="align-middle ">Age</th>
                        <th class="align-middle ">Email</th>
                        <th class="align-middle ">Phone</th>
                        <th class="align-middle ">Address</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="align-middle text-center">{{ $user->id }}</td>
                        <td class="align-middle ">
                            <img src="{{ url(Storage::url($user->avatar)) }}" alt="{{ $user->name }}"
                                width="70">
                        </td>
                        <td class="align-middle ">{{ $user->name }}</td>
                        <td class="align-middle ">{{ $user->gender }}</td>
                        <td class="align-middle ">{{ $user->age }}</td>
                        <td class="align-middle ">{{ $user->email }}</td>
                        <td class="align-middle ">{{ $user->phone }}</td>
                        <td class="align-middle ">{{ $user->address}}</td>
                        {{-- <td class="align-middle ">
                            <button class = "btn"
                                onclick="event.preventDefault(); document.getElementById('delete-{{ $user->id }}').submit();">
                                <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                            <form id="delete-{{ $user->id }}"
                                action="{{ route('user.destroy', $user->id) }}" method="POST"
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
        {{ $users->links('layout_admin.pagination') }}
    </div>
@endsection
