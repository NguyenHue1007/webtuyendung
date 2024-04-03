@EXTENDS('layout_admin.main')

@section('content')
    <div class="mb-3">
        <a type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{route('blog.create')}}">
            <i class="fas fa-plus"></i> Thêm tin tức</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách tin tức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle ">Thumbnail</th>
                            <th class="align-middle ">Title</th>
                            <th class="align-middle ">Summary</th>
                            <th class="align-middle "></th>
                            <th class="align-middle "></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td class="align-middle text-center">{{ $blog->id }}</td>
                                <td class="align-middle ">
                                    <img src="{{ url(Storage::url($blog->thumbnail)) }}" alt="{{ $blog->title }}"
                                        width="200">
                                </td>
                                <td class="align-middle ">{{ $blog->title }}</td>
                                <td class="align-middle ">{{ $blog->summary }}</td>
                                <td class="align-middle ">
                                    <a href="{{ route('blog.edit', $blog->id) }}">
                                        <i class="fas fa-edit"></i></a>
                                </td>
                                <td class="align-middle ">
                                    <button class = "btn"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $blog->id }}').submit();">
                                        <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                                    <form id="delete-{{ $blog->id }}"
                                        action="{{ route('blog.destroy', $blog->id) }}" method="POST"
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
