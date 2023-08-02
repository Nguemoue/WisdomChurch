@extends('template')

@push("stylesheets")
	<link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
	<link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet">
	<style>
		.btn-player{
			display: inline-block;
			position: relative;
		}
		.btn-player[data-current='true']{
			color: #0b0b0b;
			place-content: end;
			content: "en cours";
			/*visibility: hidden;*/
		}
		.btn-player[data-current='true']::after{
			content: 'En cours de lecture....';
			overflow-x: hidden;
			position: absolute;
			top: 0;
			text-wrap: normal;
			right: 0;
			width: 100%;
			height: 100%;
			margin: 0;

			background-color: #00a045;
			color: #0b0b0b;

		}
	</style>
@endpush
@section('content')
    <br><br>
    <section class="ftco-animate mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 ftco-animate">
                    <div class="card">
						<div class="card-header">
							<h3 id="titre-video">{{ $sermon->titre }}</h3>
						</div>
						<div class="card-body">
							<video id="my-video" class="video-js vjs-theme-city vjs-fluid " preload="auto"
								   poster="{{asset('storage/' . $sermon->poster_url)}}" src="{{ $sermon->custom_link }}" />
						</div>
						<div class="card-footer">
                            <span id="author-video" class="position">{{ $sermon->author }}</span>
                            <p id="description-video">
                                {{ $sermon->description }}.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col border shadow">
                    <h3 class="text-center">Autres videos</h3>
                    @foreach ($other as $item)
                        <div class="mb-3 bg-warning d-flex align-items-center justify-content-around border p-2">
                            <img src="{{ asset('storage/' . $item->poster_url) }}" class="img img-thumbnail user-img img-sm" alt=""
                                width="150" max-width="200">
                                &nbsp;
                            <span class="badge bg-secondary ml-3">{{ Str::substr($item->titre,0,10) }} ...</span>
                            <button  @if($item->id == $sermon->id) data-current="true" @endif data-poster="{{ asset('storage/' . $item->poster_url) }}" data-description="{{$item->description}}"
                                data-author="{{$item->author}}" data-titre="{{$item->titre}}"
                                data-video="{{ $item->custom_link }}"
                                class="change-video btn-player rounded-0 btn btn-primary">Suivre</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
	<script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

	<script>
		const videoPlayer = videojs("my-video",{
			controls:true,
			responsive:true
		})
        $(document).ready(function(){
        	$(".change-video").click(function (){
				//je desactive tout les data-current a true
				$("[data-current]").each(function(index,elt){
					$(elt).data("current",false)
					// elt.removeAttribute("data-current")
				})
        		$(this).data("current",true)
				let poster = $(this).data("poster")
				let src = $(this).data("video")
				let titre = $(this).data("titre")
				let desc = $(this).data("description")
				let auteur = $(this).data("author")

				videoPlayer.poster(poster)
				videoPlayer.src(src)
				$("#description-video").text(desc)
				$("#titre-video").text(titre)
				$("#author-video").text(auteur)
			})
		})
    </script>
@endpush
