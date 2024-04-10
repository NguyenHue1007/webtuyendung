@extends('layout_admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- <div class="card-header text-center">Create blog</div> --}}
                <div class="fw-bold">
                    <div class="card-header text-center fw-bold fs-4">Tạo tin tức mới</div>
                    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class=" col-form-label">Thumbnail</label>
                            <div>
                                <input type="file" class="form-control" name="thumbnail">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label">Summary</label>
                            <div>
                                <textarea type="text" class="form-control" name="summary" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-2 col-form-label">Content</label>
                            <div>
                                <textarea type="text" class="form-control" name="content" id="editor4" rows="30"></textarea>
                            </div>
                        </div>
                        <div class="btn-submit text-center">
                            <button type="submit" class="btn btn-primary col-3" name = "submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor4'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection
