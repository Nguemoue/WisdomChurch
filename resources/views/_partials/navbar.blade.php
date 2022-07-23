<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{route("home")}}"><i class="flaticon-cross"></i> <span>Wisdom</span>
                <span>Church</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li @class(["nav-item","active"=>Route::is("home")])><a href="{{route("home")}}" class="nav-link">Home</a></li>
                    <li @class(["nav-item","active"=>Route::is("about")])><a href="{{route("about")}}" class="nav-link">About</a></li>
                    <li @class(["nav-item","active"=>Route::is("events.*")])><a href="{{route("events.index")}}" class="nav-link">Events</a></li>
                    <li @class(["nav-item","active"=>Route::is("sermons.*")])><a href="{{route("sermons.index")}}" class="nav-link">Sermons</a></li>
                    <li @class(["nav-item","active"=>Route::is("livres.*")])><a href="{{route("livres.index")}}" class="nav-link">Livres</a></li>
          
                  {{-- <li @class(["nav-item","active"=>Route::is("")])><a href="#" class="nav-link">Blog</a></li> --}}
                    <li @class(["nav-item","active"=>Route::is("contact")])><a href="{{route("contact")}}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>