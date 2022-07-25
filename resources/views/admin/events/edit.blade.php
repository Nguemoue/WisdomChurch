@extends('admin.template')

@section('main')
    <h4 class="text-center">Editions des events</h4>
    <div class="row">
        <form class="col-8" action="{{ route('admin.events.update', [$event->id]) }}" method="post"
            enctype="multipart/form-data" id="form">
            @csrf
            @method('put')
            <div class="my-2">
                <div class="mb-4">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" value="{{ $event->titre }}" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="titre">Lieu</label>
                    <input type="text" name="lieu" value="{{ $event->lieu }}" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="titre">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5">
                        {{ $event->description }}
                    </textarea>
                </div>
                <div class="mb-4">
                    <label for="titre">Nouveau Poster Du event</label>
                    <input type="file" id="file_poster" name="poster_url" class="form-control-file border p-2"
                        accept="image/*">
                </div>


                <input type="hidden" value="" name="cropdata" id="inputHide">

                <div>
                    <button type="reset" class="btn btn-danger">Reinitialiser</button>
                    <button id="submit" type="submit" class="btn btn-outline-success">Editer
                    </button>
                </div>
            </div>
        </form>
        <p class="text-muted col-9">
            <span class="h5 mb-4">Event Actuelle</span>
            <br>
            <img src="{{ asset('storage' . DIRECTORY_SEPARATOR . $event->poster_url) }}" class="img-fluid" id="event"
                alt="">
            <button class="btn btn-social-icon btn-success mt-2" id="crop">crop</button>

        </p>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/cropper.js') }}"></script>
@endpush
@push('scripts')
    <script defer>
        const tmp = document.getElementById("event");
        const cropButton = document.getElementById("crop")
        const file_poster = document.querySelector("#file_poster")
        // file reader
        const fr = new FileReader();
        fr.onloadend = finishLoad        
        var isCropped = false
        var cropper = null;
        const uploadHiden = document.getElementById("inputHide")
        cropButton.addEventListener("click", setCroppedImageToForm)

        async function finishLoad(data) {
            await tmp.src = data.target.result
        }

        file_poster.addEventListener("change", (event) => {
            const files = event.target.files
            const blob = files[0]

            fr.readAsDataURL(files[0])

            setTimeout(() => {
                cropper = new Cropper(tmp, {
                    scalable: false,
                    viewMode: 1,
                    aspectRatio: 1,
                    cropBoxResizable: false,
                })
            }, 1000);

        })

        function setCroppedImageToForm() {
            if (!isCropped) {
                if (cropper == null) {
                    cropper = new Cropper(tmp, {
                        scalable: false,
                        viewMode: 1,
                        aspectRatio: 1,
                        cropBoxResizable: false,
                    })
                }
                canvas = cropper.getCroppedCanvas();
                canvas.toBlob(function(blob) {
                    var fr2 = new FileReader();
                    fr2.readAsDataURL(blob);
                    fr2.onloadend = function(data) {
                        uploadHiden.value = data.target.result;
                        console.log(uploadHiden.value)
                        // document.getElementById("form").submit();
                    };
                });

                isCropped = true
            }
        }
    </script>
@endpush
