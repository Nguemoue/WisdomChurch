<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('admin.index') }}">
            <span color="#ffffff">ADMINISTRATION</span>
        </a>
    </div>

    <ul class="nav">
        <li class="nav-item nav-category">
            <span class="nav-link">Onglets</span>
        </li>

        <li @class(["nav-item menu-items my-2","active"=>Route::is("admin.index")])>
            <a class="nav-link" href="{{ route("admin.index") }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role === "super admin")
            <li @class(["nav-item menu-items my-2","active"=>Route::is("admin.users.*")])>
                <a class="nav-link" href="{{ route("admin.users.index") }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-account-multiple-outline"></i>
                    </span>
                    <span class="menu-title">Users</span>
                </a>
            </li>
        @endif


        <li @class(["nav-item menu-items my-2","active"=>Route::is("admin.livres.*")])>
            <a class="nav-link" href="{{ route('admin.livres.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-book"></i>
                </span>
                <span class="menu-title"> Livres</span>
            </a>
        </li>

        <li @class(["nav-item menu-items my-2","active"=>Route::is("admin.sermons.*")])>
            <a class="nav-link" href="{{route("admin.sermons.index")}}">
                <span class="menu-icon">
                    <i class="mdi mdi-movie"></i>
                </span>
                <span class="menu-title">Sermons</span>
            </a>
        </li>

        <li @class(["nav-item menu-items my-2","active"=>Route::is("admin.events.*")])>
            <a class="nav-link" href="{{ route('admin.events.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-arrow-right-bold-hexagon-outline"></i>
                </span>
                <span class="menu-title">Events</span>
            </a>
        </li>
		<li @class(["nav-item menu-items my-2","active"=>Route::is("admin.properties.*")])>
			<a class="nav-link" href="{{ route('admin.properties.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-arrow-right-bold-hexagon-outline"></i>
                </span>
				<span class="menu-title">Parametres</span>
			</a>
		</li>

		<li @class(["nav-item menu-items my-2","active"=>Route::is("admin.testimonies.*")])>
			<a class="nav-link" href="{{ route('admin.testimonies.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-arrow-right-bold-hexagon-outline"></i>
                </span>
				<span class="menu-title">Temoignages</span>
			</a>
		</li>

        <div class="bg-white" style="color:brown"></div>
        <li class="nav-item menu-items my-1">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Acceuil</span>
            </a>
        </li>
    </ul>
</nav>
