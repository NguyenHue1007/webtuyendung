@EXTENDS('layout_admin.main')

@section('content')
    <div class="mb-3">
        <a type="button" class="btn btn-primary" href="{{route('category.create')}}">
            <i class="fas fa-plus"></i> Add category</a>
    </div>
    <div CLASS="card-body">
        <div CLASS="table-responsive bg-white rounded">
            <table CLASS="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class = "table-info">
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle ">Thumbnail</th>
                        <th class="align-middle ">Name</th>
                        <th class="align-middle "></th>
                        <th class="align-middle "></th>
                    </tr>
                </thead>

                <tbody>
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
                </tbody>
            </table>
        </div>
        {{-- {{ $categories->links('vendor.pagination.bootstrap-5') }} --}}
    </div>
@endsection
