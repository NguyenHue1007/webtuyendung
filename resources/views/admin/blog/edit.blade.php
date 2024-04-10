@extends('layout_admin.main')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="fw-bold">
                <form method="POST" action="{{ route ('blog.update',$blog->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="col-form-label">Thumbnail</label>
                        <div class="">
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Title</label>
                        <div class="">
                            <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Summary</label>
                        <div class="">
                            <textarea type="text" class="form-control" name="summary" rows="7">{{$blog->summary}}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Content</label>
                        <div class="">
                            <textarea type="text" class="form-control" name="content" id="editor4" rows="30">{!!$blog->content!!}</textarea>
                        </div>
                    </div>
                    <div class="btn-submit text-center">
                        <button type="submit" class="btn btn-primary col-3" name = "submit">Submit</button>
                    </div>
                </form>
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
