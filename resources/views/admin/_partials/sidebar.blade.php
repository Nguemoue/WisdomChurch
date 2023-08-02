<!-- partial  side bar-->
<div class="container-fluid page-body-wrapper">
	<!-- partial:partials/_navbar.html -->
	<nav class="navbar p-0 fixed-top d-flex flex-row">
		<div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
			<a class="navbar-brand brand-logo-mini" href="#">
				<span class="text-white">ADMININISTRATEUR</span>
			</a>
		</div>
		<div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
			<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
				<span class="mdi mdi-menu"></span>
			</button>
			<ul class="navbar-nav w-100">
				<li class="nav-item w-100">
					<form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
						<input type="text" class="form-control" placeholder="Search ">
					</form>
				</li>
			</ul>
			<ul class="navbar-nav navbar-nav-right">

				<li class="nav-item dropdown">
					<a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
						<div class="navbar-profile border">
							<span class=" mx-2 p-3">{{ auth()->user()->name }}</span>
							<img class="img-xs rounded-circle" src="{{ asset('storage/'.auth()->user()->photo_url) }}"
								 alt="">
							<p class="mb-0 d-none d-sm-block navbar-profile-name"></p>
							<i class="mdi mdi-menu-down d-none d-sm-block"></i>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
						 aria-labelledby="profileDropdown">
						<h6 class="p-3 mb-0">Profile</h6>
						<div class="dropdown-divider"></div>

						<div class="dropdown-divider"></div>
						<form action="{{ route('logout') }}" method="POST">
							@csrf
							<button class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<div class="preview-icon bg-dark rounded-circle">
										<i class="mdi mdi-logout text-danger"></i>
									</div>
								</div>
								<div class="preview-item-content">
									<p class="preview-subject mb-1">Log out</p>
								</div>
							</button>
						</form>
						<div class="dropdown-divider"></div>
						<a href="{{route('admin.live.done')}}" class="dropdown-item preview-item">
							<div class="preview-thumbnail">
								<div class="preview-icon bg-dark rounded-circle">
									<i class="mdi mdi-lan-connect text-success"></i>
								</div>
							</div>
							<div class="preview-item-content">
								<p class="preview-subject mb-1">Direct</p>
							</div>
						</a>
					</div>
				</li>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
					data-toggle="offcanvas">
				<span class="mdi mdi-format-line-spacing"></span>
			</button>
		</div>
	</nav>
	<!-- partial -->
