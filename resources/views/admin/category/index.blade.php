@EXTENDS('layout_admin.main')

@section('content')
    <div class="mb-3">
            <a href="{{route('category.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="fas fa-plus"></i> Thêm danh mục</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-uppercase">Danh sách danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table border" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="align-middle text-center">ID</th>
                            <th class="align-middle ">Thumbnail</th>
                            <th class="align-middle ">Name</th>
                            <th class="align-middle "></th>
                            <th class="align-middle "></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle text-center">{{ $category->id }}</td>
                                <td class="align-middle ">
                                    <img src="{{ url(Storage::url($category->thumbnail)) }}" alt="{{ $category->title }}"
                                        width="70">
                                </td>
                                <td class="align-middle ">{{ $category->name }}</td>
                                <td class="align-middle ">
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <i class="fas fa-edit"></i></a>
                                </td>
                                <td class="align-middle ">
                                    <button class = "btn"
                                        onclick="event.preventDefault(); document.getElementById('delete-{{ $category->id }}').submit();">
                                        <i class="fas fa-trash" style="color: #ec3d3a;"></i></button>
                                    <form id="delete-{{ $category->id }}"
                                        action="{{ route('category.destroy', $category->id) }}" method="POST"
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
                {{ $categories->links('layout_admin.pagination') }}
            </div>
        </div>
    </div>
@endsection
