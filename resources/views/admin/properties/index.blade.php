@extends('admin.template')

@section('main')
	<h1 class="text-center">Les Paramètres du systèmes</h1>
	@if($errors->any())
		<div class="alert alert-danger">
			@foreach($errors->all() as $error)
				<div>{{$error}}</div>
			@endforeach
		</div>
	@endif
	<div class="table-responsive mb-1">
		<fieldset>
			<form action="{{route('admin.properties.store')}}" method="post">
				@csrf
				@forelse ($properties as $property)
					<div class="form-group">
						<label for="{{$property->name}}">{{$property->name}}</label>
						<x-core.property-field :property="$property"/>
					</div>
				@empty
					<div class="alert alert-danger">
						Aucun Propriétes  pour le moment!
					</div>
				@endforelse
				<div class="mt-4 d-flex justify-content-end">
					<button class="btn btn-success">{{__("Update")}}</button>
				</div>
			</form>
		</fieldset>
	</div>
@endsection


@push('styles')
	<link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
@endpush
@push('scripts')
	@includeIf("_partials.session_messages")
@endpush
