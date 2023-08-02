<section id="home" class="video-hero js-fullheight"
{{--    style="height:700px;background-image:url(images/xbg_1.jpg.pagespeed.ic.iqKPxttw_o.jpg);background-size:cover;background-position:center center;background-attachment:fixed"--}}
    data-section="home">
    <div class="overlay js-fullheight"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="{{ route('home') }}">Home</a></span>
					<i class="fa text-white fa-chevron-right"></i>
					<span class="d-inline-block ml-2">
                        @if (!Route::is('home'))
                            @if (Route::is('events.*'))
                                Event
                            @elseif (Route::is('sermons.*'))
                                Sermon
                            @elseif(Route::is('livres.*'))
                                Livre
                            @else
                                {{Str::upper(Route::current()->uri) }}
                            @endif
                        @endif
                    </span>
                </p>
                <h1 class="mb-3 text-capitalize mt-0 bread"
                    data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                    @if (Route::is('events.show'))
                        Event Details
                    @elseif (Route::is('sermons.show'))
                        Sermon Details
                    @elseif(Route::is('livres.show'))
                        Livre Details
                    @elseif (Route::is('home'))
                        Acceuil
                    @else
                        {{ Str::upper(Route::current()->uri) }}
                    @endif

                </h1>
            </div>
        </div>
    </div>
</section>
