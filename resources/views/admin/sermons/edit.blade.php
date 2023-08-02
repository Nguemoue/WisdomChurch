@extends('admin.template')

@section('main')
	<h4 class="text-center">Editions des Sermons</h4>
	<div>
		<p class="text-muted">
			sermon actuelle
		</p>
		<video controls class="border p-2 col-4 img img-thumnail" src="{{ asset('storage/' . $sermon->video_url) }}"
			   poster="{{ asset('storage/' . $sermon->poster_url) }}"></video>

		<hr>
		<form action="{{ route('admin.sermons.update',[$sermon->id]) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('put')
			<div class="my-2">
				<div class="mb-4">
					<label for="titre">Titre</label>
					<input type="text" name="titre" value="{{$sermon->titre}}" class="form-control">
				</div>

				<div class="mb-4">
					<label for="titre">Nouveau Poster Du Sermon</label>
					<input type="file" name="poster_url" class="form-control-file border p-2" accept="image/*">
				</div>

				<div>
					<div class="mb-4" id="video_block">
						<label for="video">Video Du Sermon</label>
						<input type="file" class="form-control-file border p-2" name="video_file" accept="video/*">
					</div>
					<div class="mb-4" id="link_block">
						<label for="video_url">Lien de la video</label>
						<input id="video_url" type="url" class="form-control"
							   value="{{$sermon->is_local?'':$sermon->video_url}}" placeholder="lien de la video"
							   name="video_link">
					</div>
					<div class="form-group">
						<input type="radio" {{$sermon->is_local?'checked':''}} class="btn-check" value="video"
							   name="type" id="type_video" autocomplete="off" checked>
						<label class="btn btn-secondary" for="type_video">Video</label>

						<input type="radio" {{$sermon->is_local?'':'checked'}} class="btn-check" value="link"
							   name="type" id="type_lien" autocomplete="off">
						<label class="btn btn-secondary" for="type_lien">Lien</label>
					</div>
				</div>

				<div class="mb-4">
					<label for="titre">Description</label>
					<textarea name="description" class="form-control" id="" cols="30" rows="5">{{$sermon->titre}}</textarea>
				</div>

				<div class="mb-4">
					<label for="titre">Auteur</label>
					<input type="text" value="{{$sermon->author}}" class="form-control" name="author">
				</div>
				<div>
					<button type="reset" class="btn btn-danger">Reinitialiser</button>
					<button type="submit" class="btn btn-outline-success">Editer
					</button>
				</div>
			</div>
		</form>
	</div>
@endsection

@push("scripts")
	<script src="{{public_path("js/cropper.js")}}"></script>
	<script>
		@if($sermon->is_local)
		$("#link_block").hide()
		@else
		$("#video_block").hide()
		@endif
		$("#type_lien").click(function () {
			$("#link_block").fadeIn(200).show()
			$("#video_block").fadeOut(100).hide()
		})
		$("#type_video").click(function () {
			$("#video_block").fadeIn(100).show()
			$("#link_block").fadeOut(200).hide()
		})
	</script>
@endpush
