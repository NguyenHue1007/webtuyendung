@EXTENDS('layout_admin.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="mt-5">
        <div class="card-header text-center fw-bold fs-4 mb-4">Sửa gói dịch vụ</div>
        <div class="card-body fw-bold">
          <form method="POST" action="{{ route ('package.update',$package->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
              <label for="input-name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input id="input-name" type="text" name="name" value= "{{ $package->name }}"
                class="form-control @error('name') is-invalid @enderror" id="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row">
                <label for="input-name" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <input id="input-name" type="text" name="description" value= "{{ $package->description }}"
                  class="form-control @error('description') is-invalid @enderror" id="description">
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="input-name" class="col-sm-2 col-form-label">Max jobs</label>
                <div class="col-sm-10">
                  <input id="input-name" type="number" name="max_jobs" value= "{{ $package->max_jobs }}"
                  class="form-control @error('max_jobs') is-invalid @enderror" id="max_jobs">
                  @error('max_jobs')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-3 row">
                <label for="input-name" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input id="input-name" type="number" name="price" value= "{{ $package->price }}"
                  class="form-control @error('price') is-invalid @enderror" id="price">
                  @error('price')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
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