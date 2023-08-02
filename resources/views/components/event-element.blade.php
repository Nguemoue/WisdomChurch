@php
    $day = $date->day;
    $year = $date->year;
    $month = $date->Format("M");
    $time = $date->Format("h:s a");
    $link = $link??'#'
@endphp

<div class="col-md-6">
    <div {{ $attributes->merge(["class"=>"event-entry d-flex ftco-animate"]) }} >
        <div class="meta mr-4">
            <p>
                <span>{{ $day }}</span>
                <span>{{$month}} {{$year}}</span>
            </p>
        </div>
        <div class="text">
            <h3 class="mb-2"><a href="{{$link}}">{{$titre}}</a></h3>
            <p class="mb-4"><span>{{$time}} at {{ $lieu }}</span></p>
            <a href="{{$link}}" class="img mb-4" style="background-image: url({{$poster}});"></a>
            {{ $slot ?? "A small river named Duden flows by their place and supplies it with the necessary
            regelialia."}}
        </div>
    </div>
</div>
