@EXTENDS('layout_admin.main')

@section('content')
    <div class="mb-3">
        <a type="button" class="btn btn-primary" href="{{route('blog.create')}}">
            <i class="fas fa-plus"></i> Add news</a>
    </div>
    <div CLASS="card-body">
        <div CLASS="table-responsive bg-white rounded">
            <table CLASS="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class = "table-info">
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle ">Thumbnail</th>
                        <th class="align-middle ">Title</th>
                        <th class="align-middle ">Summary</th>
                        <th class="align-middle "></th>
                        <th class="align-middle "></th>
                    </tr>
                </thead>

                <tbody>
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
                </tbody>
            </table>
        </div>
        {{-- {{ $blogs->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
@endsection
