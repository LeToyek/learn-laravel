@extends('dashboard.layouts.index')

@section('container')
    <div class="container ">
        <form action="/create" method="POST" class="col-md-10 col-lg-6" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Example input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Another label</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                    placeholder="Another input placeholder">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Event Banner</label>
                <img class="img-preview img-fluid mb-3" id="img-preview">
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="title" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp</span>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                </div>
                <div class="col">
                    <label for="title" class="form-label">Will be held on</label>
                    <div class="input-group date" id="datepicker">
                        <input type="text" class="form-control" id="date" />
                        <span class="input-group-append">
                            <span class="input-group-text bg-light d-block">
                                <span data-feather="calendar" />
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
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
