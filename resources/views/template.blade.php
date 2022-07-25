<!DOCTYPE html>
<html lang="fr">

<head>
    <title>@yield('title', 'Katana')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" />
    <link rel="stylesheet" href="{{asset('css/katana.css')}}" />
    <script>
        (function(w, d) {
            ! function(e, t, r, a, s) {
                e[r] = e[r] || {}, e[r].executed = [], e.zaraz = {
                    deferred: []
                };
                var n = t.getElementsByTagName("title")[0];
                e[r].c = t.cookie, n && (e[r].t = t.getElementsByTagName("title")[0].text), e[r].w = e.screen.width, e[
                        r].h = e.screen.height, e[r].j = e.innerHeight, e[r].e = e.innerWidth, e[r].l = e.location.href,
                    e[r].r = t.referrer, e[r].k = e.screen.colorDepth, e[r].n = t.characterSet, e[r].o = (new Date)
                    .getTimezoneOffset(), //
                    e[s] = e[s] || [], e.zaraz._preTrack = [], e.zaraz.track = (t, r) => e.zaraz._preTrack.push([t, r]),
                    e[s].push({
                        "zaraz.start": (new Date).getTime()
                    });
                var i = t.getElementsByTagName(a)[0],
                    o = t.createElement(a);
                o.defer = !0, o.src = "../../cdn-cgi/zaraz/sd41d.js?" + new URLSearchParams(e[r]).toString(), i
                    .parentNode.insertBefore(o, i)
            }(w, d, "zarazData", "script", "dataLayer");
        })(window, document);
    </script>
</head>

<body>
    @includeIf('_partials.navbar')


    <section id="home" class="video-hero js-fullheight"
        style="height:700px;background-image:url(images/xbg_1.jpg.pagespeed.ic.iqKPxttw_o.jpg);background-size:cover;background-position:center center;background-attachment:fixed"
        data-section="home">
        <div class="overlay js-fullheight"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="{{ route("home") }}">Home</a></span>
                        <span>
                            @if (!Route::is('home'))
                                {{ Route::current()->uri }}
                            @endif
                        </span>
                    </p>
                    <h1 class="mb-3 text-capitalize mt-0 bread"
                        data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                        @if (!Route::is('home'))
                            {{ Route::current()->uri }}
                        @else
                            Home
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-bible-study">
        <div class="container-wrap">
            <div class="col-md-12 wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 d-md-flex">
                            <div class="one-forth ftco-animate">
                                <h3>Bible Study</h3>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia.</p>
                            </div>
                            <div class="one-half d-md-flex align-items-md-center ftco-animate">
                                <div class="countdown-wrap">
                                    <p class="countdown d-flex">
                                        <span id="days"></span>
                                        <span id="hours"></span>
                                        <span id="minutes"></span>
                                        <span id="seconds"></span>
                                    </p>
                                </div>
                                <div class="button block float-right ml-10">
                                    <p><a href="#" class="btn btn-primary p-3">Events Details</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @yield('content')

    {{-- footer --}}
    @includeIf('_partials.footer')

    {{-- loader && scripts --}}
    @includeIf('_partials.script')

    {{-- include the toast session message --}}
    @includeIf("_partials.session_messages")
</body>

<!-- Mirrored from preview.colorlib.com/theme/wisdom/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 11:52:17 GMT -->

</html>
