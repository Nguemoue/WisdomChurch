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
    <div class="container border p-4">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control">
            </div>
            <div class="mb-4">
                <label for="titre">Lieu De l'event</label>
                <input type="text" name="lieu" class="form-control border p-2" >
            </div>
            <div class="mb-4">
                <label for="titre">Date de Debut</label>
                <input type="datetime-local" name="start_at" class="form-control">
            </div>
            <div class="mb-4">
                <label for="titre">Poster De event</label>
                <input type="file" name="poster_url" class="form-control-file border p-2" accept="image/*">
            </div>

            <div class="mb-4">
                <label for="titre">Description event</label>
                <textarea type="file" name="description" class="form-control border p-2"></textarea>
            </div>
            <div>
                <button type="reset" class="btn btn-danger">Reinitialiser</button>
                <button type="submit" class="btn btn-success">Creer</button>
            </div>
        </form>
    </div>
@endsection
