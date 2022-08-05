@extends("template")

@section("content")
<section class="ftco-section ftco-section-2">
        <div class="container">
            <div class="row">
                @foreach ($events  as $event)
                    <x-event-element :lieu="$event->lieu" :link="route('events.show',['event'=>$event->id])" :date="$event->start_at" :poster="asset('storage/'.$event->poster_url)" :titre="$event->titre"  >
                        {{$event->description}}
                    </x-event-element>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            {{ $events->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
