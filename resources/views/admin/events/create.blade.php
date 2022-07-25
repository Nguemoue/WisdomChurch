@extends('admin.template')

@section('main')
    @if ($errors->any())
        <div class="alert alert-secondary alert-dismissible">
            <div class="alert-heading">des Erreurs on ete detectes</div>
            @foreach ($errors->all() as $error)
                <div>
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif
    <div class="container border p-2">
        <div class="row">
            <form action="{{ route('admin.events.store') }}" class="col-5" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="titre">Lieu De l'event</label>
                    <input type="text" name="lieu" class="form-control border p-2">
                </div>
                <div class="mb-4">
                    <label for="titre">Date de Debut</label>
                    <input type="datetime-local" name="start_at" class="form-control">
                </div>
                <div class="mb-4">
                    <label for="titre">Poster De event</label>
                    <input type="file" id="file" name="poster_url" class="form-control-file border p-2" accept="image/*">
                </div>

                <div class="mb-4">
                    <label for="titre">Description event</label>
                    <textarea name="description" class="form-control border p-2"></textarea>
                </div>
                <input type="hidden" name="cropdata" value="" id="inputHide">
                <div>
                    <button type="reset" class="btn btn-danger">Reinitialiser</button>
                    <button type="submit" class="btn btn-success">Creer</button>
                </div>
            </form>
            <div class="col-7  ">
                <div class="border p-1">
                    <img src="" class="img-fluid" alt="" id="viewbox">
                    <button class="btn btn-social-icon  btn-success" id="crop">crop</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cropper.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/cropper.js') }}"></script>
    <script defer>
        const file_poster = document.getElementById("file"),
            fr = new FileReader(),
            uploadHiden = document.getElementById("inputHide"),
            cropButton = document.getElementById("crop"),
            tmp = document.getElementById("viewbox");

        var cropper = null;

        fr.onload = finishLoad

        async function finishLoad(data) {
            tmp.src = data.target.result
        }

        cropButton.onclick = function() {
            setCroppedImageToForm()
        }

        file_poster.addEventListener("change", (event) => {

            let files = event.target.files
            let blob = files[0]
            fr.readAsDataURL(files[0])

            setInterval(() => {
                cropper = new Cropper(tmp, {
                    scalable: true,
                    viewMode: 6/2,
                    aspectRatio: 1,
                    cropBoxResizable: false,
                });
            }, 1000);
        })

        function done() {
            cropper = new Cropper(tmp, {
                scalable: false,
                viewMode: 2,
                aspectRatio: 1,
                cropBoxResizable: false,
            });
        }

        function setCroppedImageToForm() {
            console.log(cropper)
            const canvas = cropper.getCroppedCanvas();
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
    </script>
@endpush
