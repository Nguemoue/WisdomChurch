<x-app-layout>
	<x-slot name="header">
		<h2 class="jumbotron-fluid jumbotron">
			{{ __('Testimony') }}
		</h2>
	</x-slot>

	<div class="py-4">
	<div class="d-flex justify-content-end">
		<button data-bs-toggle="modal" data-bs-target="#createModal" class="btn btn-success">Nouveau</button>
		<x-modal-component id="createModal" title="Nouveau Témoignage">
			<form method="post" action="{{route('testimony.store')}}">
				@csrf
				<input type="hidden" name="user_id" value="{{base64_encode(webAuth()->id())}}">
				<div class="form-group">
					<label for="content">Contenu</label>
					<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="mt-4 d-flex justify-content-end">
					<button class="btn btn-primary"><i class="bx bx-save "></i> {{__('Save')}}</button>
				</div>
			</form>
		</x-modal-component>
	</div>
		<hr>
		<table class="table table-bordered datatable">
			<thead>
			<tr>
				<th>#</th>
				<th>Contenu</th>
				<th>Posté le </th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			@foreach($testimonies as $testimony)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$testimony->content}}</td>
					<td>{{$testimony->created_at->diffForHumans()}}</td>
					<td>
						<div class="btn-group btn-group-sm">
							<button data-bs-target="#editModal{{$testimony->id}}" data-bs-toggle="modal" class="btn btn-sm btn-primary" href="#"><i class="bx bx-pencil"></i></button>
							<button data-bs-target="#deleteModal{{$testimony->id}}" data-bs-toggle="modal" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>

						</div>
					</td>
					{{--modal pour editer un testimony--}}
					<x-modal-component :id="'editModal'.$testimony->id" :title="__('Edit')">
						<form method="post" action="{{route('testimony.update',[$testimony->id])}}">
							@csrf
							<div class="form-group">
								<label for="content">Contenu</label>
								<textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$testimony->content}}</textarea>
							</div>
							<div class="mt-4 d-flex justify-content-end">
								<button class="btn btn-primary"><i class="bx bx-save "></i> {{__('Edit')}}</button>
							</div>
						</form>
					</x-modal-component>
					{{--modal pour supprimer--}}
					<x-modal-component :id="'deleteModal'.$testimony->id" :title="__('Are you sure you want to force delete this resource?')">
						<form method="post" action="{{route('testimony.destroy',[$testimony->id])}}">
							@csrf

							<div class="mt-4 d-flex justify-content-end">
								<button class="btn btn-primary"><i class="bx bx-save "></i> {{__('Yes, Delete')}}</button>
							</div>
						</form>
					</x-modal-component>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</x-app-layout>
