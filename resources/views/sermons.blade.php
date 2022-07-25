@extends("template")
    
@section("content")
    @includeIf("_partials.upcoming-event")

<section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($sermons as $sermon)
                <x-sermon-element :link="route('sermons.show',['sermon'=>$sermon->id])" :title="$sermon->titre" :pastor="$sermon->author" :description="Str::words($sermon->description,5)" :poster="asset('storage/'.$sermon->poster_url)" />
                @endforeach
                
            </div>

            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        {{-- <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul> --}}
                        {{$sermons->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection