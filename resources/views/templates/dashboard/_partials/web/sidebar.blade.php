<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="#" class="app-brand-link">
			<span class="app-brand-text demo menu-text text-uppercase fw-bolder ms-2">{{config('app.name')}}</span>
		</a>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li @class(["menu-item","active"=>Route::is("dashboard")])>
			<a href="{{route('dashboard')}}" @class(["menu-link"])>
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">{{__('Dashboard')}}</div>
			</a>
		</li>


		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Pages</span>
		</li>
		<li @class(["menu-item","active open"=>Route::is("dashboard.account.*")])>
			<a href="javascript:void(0)" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-dock-top"></i>
				<div data-i18n="Account Settings">Account Settings</div>
			</a>
			<ul class="menu-sub list-unstyled">
				<li @class(["menu-item","active"=>Route::is("dashboard.account.settings")])>
					<a href="{{route('dashboard.account.settings')}}" @class(["menu-link"])>
						<div data-i18n="Mon compte">Account</div>
					</a>
				</li>
				<li @class(["menu-item","active"=>Route::is("dashboard.account.notifications")])>
					<a href="{{route('dashboard.account.notifications')}}" @class(["menu-link"])>
						<div data-i18n="Notifications">Notifications</div>
					</a>
				</li>

			</ul>
		</li>
		<li @class(["menu-item","active open"=>Route::is("testimony.*")])>
			<a href="javascript:void(0);" class="menu-link menu-toggle">
				<i class="menu-icon tf-icons bx bx-cube-alt"></i>
				<div data-i18n="Misc">Modules</div>
			</a>
			<ul class="menu-sub">
				<li @class(["menu-item","active"=>Route::is("testimony.index")])>
					<a href="{{route('testimony.index',[base64_encode(auth("web")->id())])}}" @class(["menu-link"])>
						<div data-i18n="Error">{{__('Testimony')}}</div>
					</a>
				</li>
			</ul>
		</li>
		<!-- Misc -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
		<li class="menu-item">
			<a
				href="#"
				target="_blank"
				@class(["menu-link"])
			>
				<i class="menu-icon tf-icons bx bx-support"></i>
				<div data-i18n="Support">Support</div>
			</a>
		</li>
		<li class="menu-item">
			<a
				href="{{route("home")}}"
				target="_blank"
				@class(["menu-link"])
			>
				<i class="menu-icon tf-icons bx bx-arrow-back"></i>
				<div data-i18n="Support">{{__('Home')}}</div>
			</a>
		</li>

	</ul>
</aside>
