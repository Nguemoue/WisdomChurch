@extends('template')

@section('title')
	Acceuil
@endsection

@section('content')
	@includeIf("_partials.upcoming-event")

	<section class="ftco-section-2">
		<div class="container-fluid">
			<div class="section-2-blocks-wrapper d-flex row no-gutters">
				<div class="img col-md-6 ftco-animate" style="background-image: url({{asset('images/about.jpg')}});">
					<a href="#" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
				</div>
				<div class="text col-md-6 ftco-animate">
					<div class="text-inner align-self-start">
						<h3>Loving God, Loving Others and Serving the World</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
							Semantics, a large language ocean.</p>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
							It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- ours services --}}
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-5">
				<div class="col-md-6 text-center heading-section ftco-animate">
					<span class="subheading">Our Services</span>
					<h2 class="mb-4">Giving light to someone</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
						live the blind texts. Separated they live in</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="d-flex justify-content-center">
							<div class="icon d-flex justify-content-center mb-3"><span
									class="align-self-center flaticon-planet-earth"></span></div>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">I'm New Here</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="d-flex justify-content-center">
							<div class="icon d-flex justify-content-center mb-3"><span
									class="align-self-center flaticon-maternity"></span></div>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Care Ministries</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="d-flex justify-content-center">
							<div class="icon d-flex justify-content-center mb-3"><span
									class="align-self-center flaticon-pray"></span></div>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Prayer Request</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="d-flex justify-content-center">
							<div class="icon d-flex justify-content-center mb-3"><span
									class="align-self-center flaticon-podcast"></span></div>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Podcasts</h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost
								unorthographic.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	{{-- sermons --}}
	@if($sermons->count())
		<section class="ftco-section">
			<div class="container">
				<div class="row no-gutters justify-content-center mb-5 pb-5">
					<div class="col-md-7 text-center heading-section ftco-animate">
						<span class="subheading">Sermons</span>
						<h2 class="mb-4">Watch our sermons</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there
							live the blind texts. Separated they live in</p>
					</div>
				</div>
				<div class="row">

					@foreach ($sermons as $sermon)
						<x-sermon-element :link="route('sermons.show', ['sermon' => $sermon->id])"
										  :title="$sermon->titre" :pastor="$sermon->author"
										  :description="Str::words($sermon->description, 5)"
										  :poster="asset('storage/' . $sermon->poster_url)"/>
					@endforeach
				</div>
				<div class="row mt-5">
					<div class="col text-center">
						<p><a href="{{route('sermons.index')}}" class="btn btn-primary btn-outline-primary p-3">Watch
								all sermons</a></p>
					</div>
				</div>
			</div>
		</section>
	@endif


	{{-- Testimonies --}}
	@if($testimonies->count())


		<section class="ftco-section testimony-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-5">
					<div class="col-md-7 text-center heading-section ftco-animate">
						<span class="subheading">Read, Get Inspired, and Share Your Story</span>
						<h2 class="mb-4">Testimonies</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there
							live the blind texts. Separated they live in</p>
					</div>
				</div>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel ftco-owl">
							@foreach($testimonies as $testimony)
								<div class="item text-center">
									<div class="testimony-wrap p-4 pb-5">
										<div class="user-img mb-4"
											 style="background-image: url({{asset(defaultPath('avatars').$testimony->user->photo_url)}})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
										</div>
										<div class="text">
											<p class="mb-5">{{$testimony->content}}</p>
											<p class="name">{{$testimony->user->name}}</p>
											<span class="position">Member</span>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						<div class="row mt-5">
							<div class="col text-center">
								<p><a href="{{route('testimony.index')}}" class="btn btn-primary btn-outline-primary p-3">Watch
										all Testimony</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif

	{{-- church achievements --}}
	<section class="ftco-section ftco-counter" id="section-counter">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-5">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<h2>Church Achievements</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
						live the blind texts. Separated they live in</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18 text-center">
						<div class="text">
							<strong class="number" data-number="{{$properties[config('app.props_name.church')]->value}}">0</strong>
							<span>Churches around the world</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18 text-center">
						<div class="text">
							<strong class="number" data-number="{{$properties[config('app.props_name.members')]->value}}">0</strong>
							<span>Members around the globe</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex justify-content-center counter-wrap ftco-animate">
					<div class="block-18 text-center">
						<div class="text">
							<strong class="number" data-number="{{$properties[config('app.props_name.saved_life')]->value}}">0</strong>
							<span>Save life &amp; Donations</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	{{-- events section --}}
	@if($events->count())
		<section class="ftco-section-2 bg-light">
			<div class="container-fluid">
				<div class="row no-gutters d-flex">
					<div class="col-md-6 img d-flex justify-content-end align-items-center"
						 style="background-image: url(images/event.jpg);">
						<div
							class="col-md-7 heading-section text-sm-center text-md-right heading-section-white ftco-animate mr-md-5 mt-md-5">
							<h2>Our latest events</h2>
							<p>{{$lastEvent->description}}</p>
							<p><a href="{{route('events.last')}}" class="btn btn-primary py-3 px-4">View Events</a></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="event-wrap">
							@foreach($events as $event)
								<div class="event-entry d-flex ftco-animate">
									<div class="meta mr-4">
										<p>
											<span>{{$event->start_at->daysInMonth}}</span>
											<span>{{$event->start_at->format("M Y")}}</span>
										</p>
									</div>
									<div class="text">
										<h3 class="mb-2"><a href="#">{{$event->titre}}</a></h3>
										<p class="mb-4">
											<span>{{$event->start_at->IsoFormat("h:s a")}} at {{$event->lieu}}</span>
										</p>
										<a href="#" class="img"
										   style="background-image: url({{asset('storage/'.$event->poster_url)}});"></a>
									</div>
								</div>
							@endforeach


						</div>
					</div>
				</div>
			</div>
		</section>
	@endif

@endsection
