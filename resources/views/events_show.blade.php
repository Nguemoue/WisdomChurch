@extends("template")

@section("content")
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <h2 class="text-center text-muted text-uppercase">cette evenement commencera   {{ $event->start_at->diffForHumans()}} </h2>
                <div class="col-lg-6">
                    <img class="img " src="{{asset('storage/'.$event->poster_url)}}" alt="">
                </div>
                <div class="col col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Details Sur l'evenement</h3>

                        </div>
                        <div class="card-body">
                            <p>
                                Description : <span>{{$event->description}}</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
