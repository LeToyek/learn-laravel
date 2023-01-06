@extends('dashboard.layouts.index')
{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
@section('container')
    <div class="container ">
        <form action="/dashboard/events" method="POST" class="col-md-10 col-lg-8" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                    value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post Event Banner</label>
                <img class="img-preview img-fluid mb-3" id="img-preview">
                <input  class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="title" class="form-label">Category</label>
                    <select name="category_id" class="input form-select @error('slug') is-invalid @enderror">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
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
                        <input value="{{ old('price') }}" type="text" name="price"
                            class="form-control @error('price') is-invalid @enderror">
                    </div>
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="col">
                    <label for="date" class="form-label">Will be held on</label>
                    <div class="input-group date">
                        <input type="date" name="event_date" value="{{ old('event_date') }}"
                            class="form-control @error('event_date') is-invalid @enderror" id="datepicker" />
                        <span class="input-group-text" id="basic-addon1">
                            <span data-feather="calendar" />
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
                <textarea class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" id="description" rows="2"
                    style="resize: none" aria-valuetext="{{ old('title') }}"></textarea>
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
        // const datePicker = document.querySelector('#datepicker')
        // console.log(datePicker)
        // flatpickr('#datepicker', {
        //     minDate: "today",
        //     enableTime: true
        // })
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
