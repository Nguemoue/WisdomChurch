@extends('template')

@section('content')
    <br><br>
    <section class="ftco-animate mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-7 ftco-animate">
                    <div class="sermons">
                        <video id="current" style="position: relative"
                            class="img relative popup-vimeo d-flex justify-content-center align-items-center"
                            style="background-image: url({{ asset('storage/' . $sermon->poster_url) }});"
                            src="{{ asset('storage/' . $sermon->video_url) }}"
                            poster="{{ asset('storage/' . $sermon->poster_url) }}" controls>
                        </video>
                        <div class="text">
                            <h3 class="titre-video">{{ $sermon->titre }}</h3>
                            <span class="position author-video">{{ $sermon->author }}</span>
                            <p class="description-video">
                                {{ $sermon->description }}.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col border">
                    <h3>Autres videos</h3>
                    @foreach ($other as $item)
                        <div class="mb-3 d-flex align-items-center justify-content-between border p-4">
                            <img src="{{ asset('storage/' . $item->poster_url) }}" class="img img-thumbnail user-img img-sm" alt=""
                                width="150" max-width="200">
                                &nbsp;
                                &nbsp;
                                &nbsp;
                            <span class="badge bg-secondary ml-3">{{ $item->titre }}</span>
                            <button data-poster="{{ asset('storage/' . $item->poster_url) }}" data-description="{{$item->description}}"
                                data-author="{{$item->author}}" data-titre="{{$item->titre}}"
                                data-video="{{ asset('storage/' . $item->video_url) }}"
                                class="change-video btn btn-primary">Suivre</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script defer>
        const changeButtons = document.querySelectorAll(".change-video")
        const video = document.getElementById("current")
        changeButtons.forEach(element => {
            element.addEventListener("click", (event) =>{
                console.log(this)
                let nextDiv = video.nextElementSibling
                let author = nextDiv.querySelector(".author-video");
                let description = nextDiv.querySelector(".description-video")
                let titre = nextDiv.querySelector(".titre-video")
                // alert(nextDiv.querySelector(".author-video"))
                let src = event.target.dataset.video
                let poster = event.target.dataset.poster
                titre.innerText = event.target.dataset.titre
                description.innerText = event.target.dataset.description
                author.innerText = event.target.dataset.author

                // je permujte sur le poster
                // event.target.dataset.video = video.src
                // event.target.dataset.poster = video.poster
                video.src = src
                video.poster = poster


            })
        });
    </script>
@endpush
