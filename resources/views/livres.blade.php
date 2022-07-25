@extends('template')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($livres as $livre)
                    <div class="col-md-4 ftco-animate shadow">
                        <x-livre-element class="border p-2" :poster="asset('storage/' . $livre->poster_url)" :title="$livre->titre" :link="route('livres.index')">
                            <button class="btn btn-primary">voir</button>
                            <a  href="{{route('book.download',['id'=>$livre->id])}}" class="ml-4 border btn download-button" onclick="download" >
                                <span class="icon">
                                    <span class="icon-laptop"></span>
                                </span>
                                Telecharger
                            </a>
                        </x-livre-element>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push("scripts")
    <script defer>
        const downloadButton = document.querySelecter(".download-button")
        downloadButton.forEach(element => {
            element.onclick = function(event){
                let res = confirm("voulez vous telecharger ?")
                if(!res){
                    event.preventDefault()                    
                }
            }
        });
        function download(event){
            let response = confirm("voulez vous telecharger le document ? ")
            event.preventDefault();
                
            
        }
    </script>

@endpush