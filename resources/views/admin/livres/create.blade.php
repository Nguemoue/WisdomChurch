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
            <form action="{{ route('admin.livres.store') }}" class="col-5" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" class="form-control">
                </div>

                <div class="mb-4">
                    <label for="titre">Poster De livre</label>
                    <input type="file" id="file" name="poster_url" class="form-control-file border p-2" accept="image/*">
                </div>
                <div class="mb-4">
                    <label for="titre">Chemin du pdf</label>
                    <input type="file" id="file" name="resource_url" class="form-control-file border p-2" accept="application/pdf">
                </div>
                <div class="mb-4">
                    <label for="titre">Description livre</label>
                    <textarea name="description" class="form-control border p-2"></textarea>
                </div>

                <input type="hidden" name="cropdata" value="" id="inputHide">
                <div>
                    <button type="reset" class="btn btn-danger">Reinitialiser</button>
                    <button type="submit" class="btn btn-success">Creer</button>
                </div>
            </form>

        </div>
    </div>
@endsection
