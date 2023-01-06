@extends('dashboard.layouts.index')

@section('container')
    <div class="container ">
        <form action="/dashboard/events" method="POST" class="col-md-10 col-lg-8" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    id="slug">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Event Banner</label>
                <img class="img-preview img-fluid mb-3" id="img-preview">
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="title" class="form-label">Category</label>
                    <select name="category_id" class="input form-select @error('slug') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror">
                    </div>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }} AWOKAOWKOAW
                        </div>
                    @enderror

                </div>
                <div class="col">
                    <label for="date" class="form-label">Will be held on</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" name="event_date"
                            class="form-control @error('event_date') is-invalid @enderror" id="date" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <span data-feather="calendar" />
                            </span>
                        </span>
                    </div>
                    @error('event_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('event_date') is-invalid @enderror" name="excerpt" id="description" rows="2"
                    style="resize: none"></textarea>
                @error('excerpt')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>

    </div>
    <script>
        const datePicker = document.querySelector('#datepicker')
        console.log(datePicker)
        datePicker.addEventListener('click', function() {
            datePicker()
        })
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            if (title.value.length != 0) {

                fetch('/dashboard/events/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            } else {
                slug.value = ""
            }
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
