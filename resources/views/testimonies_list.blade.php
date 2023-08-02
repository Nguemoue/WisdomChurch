@extends("template")

@section("content")
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
			<div class="row">

			@foreach($testimonies as $testimony)
				<div class="col-md-4 col-sm-6 col-lg-3">
					<div class="card">
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
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>

@endsection
