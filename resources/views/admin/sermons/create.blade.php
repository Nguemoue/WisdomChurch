@extends("admin.template")

@section("main")
@if ($errors->any())

    <div class="alert alert-secondary alert-dismissible">
        <div class="alert-heading">des Erreurs on ete detectes</div>
        @foreach ($errors->all() as $error )
            <div>
                {{$error}}
            </div>
        @endforeach
    </div>
@endif
    <div class="container border p-4">
        <form action="{{ route("admin.sermons.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="titre">Titre</label>
                <input type="text" name="titre" class="form-control" id="titre" value="{{old('titre')}}">
            </div>

            <div class="mb-4">
                <label for="titre">Poster Du Sermon</label>
                <input type="file" name="poster_url" class="form-control-file border p-2" accept="image/*">
            </div>

			<div>
				<div class="mb-4" id="video_block">
					<label for="video">Video Du Sermon</label>
					<input type="file" class="form-control-file border p-2" name="video_file" accept="video/*">
				</div>
				<div class="mb-4" id="link_block">
					<label for="video_url">Lien de la video</label>
					<input id="video_url" type="url" class="form-control" value="{{old('video_link')}}" placeholder="lien de la video" name="video_link">
				</div>
				<div class="form-group">
					<input type="radio" class="btn-check" value="video" name="type" id="type_video" autocomplete="off" checked>
					<label class="btn btn-secondary" for="type_video">Video</label>

					<input type="radio" class="btn-check" value="link" name="type" id="type_lien" autocomplete="off">
					<label class="btn btn-secondary" for="type_lien">Lien</label>
				</div>
			</div>

            <div class="mb-4">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="mb-4">
                <label for="auteur">Auteur</label>
                <input type="text" id="auteur" value="{{old('author')}}" class="form-control" name="author">
            </div>
            <div>
                <button type="reset" class="btn btn-danger">Reinitialiser</button>
                <button type="submit" class="btn btn-success">Creer</button>
            </div>
        </form>
    </div>
@endsection

@push("scripts")
	<script>
		$("#link_block").hide()
		$("#type_lien").click(function(){
			$("#link_block").fadeIn(200).show()
			$("#video_block").fadeOut(100).hide()
		})
		$("#type_video").click(function(){
			$("#video_block").fadeIn(100).show()
			$("#link_block").fadeOut(200).hide()
		})
	</script>
@endpush
