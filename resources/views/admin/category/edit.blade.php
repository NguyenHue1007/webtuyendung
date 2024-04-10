@EXTENDS('layout_admin.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mt-5">
        <div class="card-header text-center fw-bold fs-4 mb-4">Sửa danh mục</div>
        <div class="card-body fw-bold">
          <form method="POST" action="{{ route ('category.update',$category->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
              <label for="input-name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input id="input-name" type="text" name="name" value= "{{ $category->name }}"
                class="form-control @error('name') is-invalid @enderror" id="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Thumbnail</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="thumbnail">
              </div>
            </div>
            <div class="btn-submit text-center">
              <button type="submit" class="btn btn-primary col-3" name = "submit">Edit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection