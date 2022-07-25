<!DOCTYPE html>
<html lang="en">
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

    @includeIf("_partials.home-section")    

    
    @yield('content')

    {{-- footer --}}
    @includeIf('_partials.footer')

    {{-- loader && scripts --}}
    @includeIf('_partials.script')

    {{-- include the toast session message --}}
    @includeIf("_partials.session_messages")
    @stack("scripts")
</body>

<!-- Mirrored from preview.colorlib.com/theme/wisdom/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Jan 2022 11:52:17 GMT -->

</html>
