@extends('template')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($livres as $livre)
                    <div class="col-md-4 ftco-animate shadow">
                        <x-livre-element class="border p-2" :poster="asset('storage/' . $livre->poster_url)" :title="$livre->titre" :link="route('livres.index')">
                        </x-livre-element>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
