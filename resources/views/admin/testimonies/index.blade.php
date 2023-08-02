@extends('admin.template')

@section('main')
	<h1 class="text-center">Les Temoignages</h1>

	<div class="table-responsive mb-1">
		<table class="table  table-bordered">
			<caption>Listes des Témoignages</caption>
			<thead>
			<tr>
				<th>#</th>
				<th>Author</th>
				<th>Contenu</th>
				<th>Photo</th>
				<th>Poste le </th>
				<th>Actionn</th>
			</tr>
			</thead>
			<tbody>
			@forelse ($testimonies as $testimony)
				<tr>
					<td>{{ $loop->index + 1 }}</td>
					<td> {{ $testimony->titre }} </td>
					<td> {{ $testimony->author }} </td>
					<td> {{ Str::words($testimony->description, 5) }} </td>
					<td> {{ $testimony->created_at->diffForHumans() }} </td>
					<td>
						<div class="btn-group">
							<form method="POST"
								  action="{{ route('admin.testimonies.destroy', ['testimony' => $testimony->id]) }}"
								  class="menu-icon">
								@csrf
								@method('delete')
								<button class="mdi mdi-delete mdi-30px btn btn-outline-warning" type="submit"> </button>
							</form>
							&nbsp;
							<a href="{{ route('admin.testimonies.edit', ['testimony' => $testimony->id]) }}"
							   class="btn btn-outline-info"><i class="mdi mdi-pencil"></i></a>
						</div>
					</td>
				</tr>
			@empty
				<div class="alert alert-danger">
					Aucun temoignages pour le moment!
				</div>
			@endforelse
			</tbody>

		</table>
	</div>
@endsection


@push('styles')
	<link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
@endpush
@push('scripts')
	@includeIf("_partials.session_messages")
@endpush
