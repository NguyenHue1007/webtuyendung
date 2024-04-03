@EXTENDS('layout_admin.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách người tìm việc</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle ">Avatar</th>
                            <th class="align-middle ">Name</th>
                            <th class="align-middle ">Gender</th>
                            <th class="align-middle ">Age</th>
                            <th class="align-middle ">Email</th>
                            <th class="align-middle ">Phone</th>
                            <th class="align-middle ">Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                        <tr>
                            <td class="align-middle text-center">{{ $user->id }}</td>
                            <td class="align-middle">
                                @if($user->avatar)
                                <img class="rounded-circle"src="{{ url(Storage::url($user->avatar)) }}" alt="{{ $user->name }}"
                                    width="40">
                                    @else

                                <img class="rounded-circle" src="{{url('img/profile.png')}}"  width="40">
                                @endif
                            </td>
                            <td class="align-middle ">{{ $user->name }}</td>
                            <td class="align-middle ">{{ $user->gender }}</td>
                            <td class="align-middle ">{{ $user->age }}</td>
                            <td class="align-middle ">{{ $user->email }}</td>
                            <td class="align-middle ">{{ $user->phone }}</td>
                            <td class="align-middle ">{{ $user->address }}</td>
                            <td class="align-middle ">
                            <button class = "btn"
                                onclick="event.preventDefault(); document.getElementById('delete-{{ $user->id }}').submit();">
                                <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                            <form id="delete-{{ $user->id }}"
                                action="{{ route('user.destroy', $user->id) }}" method="POST"
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
                {{ $users->links('layout_admin.pagination') }}
            </div>
        </div>
    </div>
@endsection
