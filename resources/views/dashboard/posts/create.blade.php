@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-8">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-start pt-3 pb-2 mb-1 border-bottom">
            <h1 class="h2">Create Post</h1>
        </div>
        <form method="POST" action="/dashboard/posts" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input require type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input require type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    id="slug" readonly value="{{ old('slug') }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img class="img-preview img-fluid mb-3" id="img-preview">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input require id="body" type="hidden" name="body">
                <trix-editor input="body"></trix-editor>

            </div>


            <button id="btnSubmit" type="submit" class="btn btn-primary">Create A Post</button>
        </form>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)

        })



        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
        const previewImage = () => {
            const image = document.querySelector('#image')
            const imagePreview = document.querySelector('#img-preview')

            imagePreview.style.display = 'block'
            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0])

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
