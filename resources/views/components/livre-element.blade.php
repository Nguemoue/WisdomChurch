    <div {{$attributes->merge(["class"=>"sermons"])}} >
        <a href="{{ $link }}" class="img popup-vimeo mb-3 d-flex justify-content-center align-items-center"
            style="background-image: url({{ $poster }});">
            <div class="icon d-flex justify-content-center align-items-center">
                <span class="icon-person"></span>
            </div>
        </a>
        <div class="text">
            <h3><a href="#">{{ $title }}</a></h3>
            <p>
                {{ $slot }}.
            </p>
        </div>
    </div>
