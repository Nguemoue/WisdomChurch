<x-app-layout>
	<x-slot name="header">
		<h4 class="jumbotron">Information sur votre Compte</h4>
	</x-slot>

	<div class="row">
		<div class="col-sm-6 grid-margin my-4">
			<div class="card">
				<div class="card-body">
					<h5 class="mb-4">Details de Votre Comptes</h5>
					<hr>
					<div class="row">
						<div class="col-8 col-sm-12 col-xl-8 my-auto">
							<div class="d-flex d-sm-block d-md-flex flex-column align-items-right">
								<p class="mb-2">Nom: <span
										class="badge text-sm bg-white text-danger floadt-end d-inline-block"> {{ auth()->user()->name }} </span>
								</p>
								<p class="mb-2">Email: <span
										class="badge text-sm bg-white text-danger"> {{ auth()->user()->email  }} </span>
								</p>
								<p class="mb-2">Telephone: <span
										class="badge text-sm bg-white text-danger"> {{ auth()->user()->tel }} </span>
								</p>
							</div>
						</div>
						<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
							<i class="icon-lg mdi mdi-account-details text-primary ml-auto"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6 grid-margin my-4">
			<div class="card">
				<div class="card-body">
					<h5>Photo de Profil</h5>
					<div class="row">
						<div class="col-8 col-sm-12 col-xl-8 my-auto">
							<div class="d-flex d-sm-block d-md-flex align-items-center">
								<img class="img-fluid user-img img-lg"
									 src="{{ asset('storage/' . auth()->user()->photo_url) }}" alt="">
							</div>
						</div>
						<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
							<i class="icon-lg mdi mdi-image-frame text-danger ml-auto"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row ">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Changer de Profil</h4>
					<form action="{{route('dashboard.account.settings.update',[webAuth()->id()])}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="mb-2">
							<label for="password">Nouveau Profil</label>
							<input type="file" name="photo_url" class="control-file form-file form-control-file"
								   accept="image/*">
						</div>
						<button type="submit" class="btn mt-1 btn-success">changer</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row my-4">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Changer de mot de passe</h4>
					<form action="{{route('dashboard.account.settings.update',[webAuth()->id()])}}" method="post">
						@csrf
						<div class="mb-2">
							<label for="password">Nouveau Mot de passe</label>
							<input id="password" type="password" name="password" class="form-control">
						</div>
						<div class="mb-2">
							<label for="password">Confirmer Mot de passe</label>
							<input type="password"  id="password" name="password_confirmation" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">Valider</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>
