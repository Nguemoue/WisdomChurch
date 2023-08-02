<x-app-layout>
	<x-slot name="header">
		<h4 class="jumbotron">Vos Notifications</h4>
	</x-slot>

	<div class="row">
		<div class="col-sm-12 grid-margin my-4">
			<div class="card">
				<div class="card-body">
					<h5 class="mb-4"></h5>

					<div class="d-flex justify-content-end my-3">
						<form action="{{route('dashboard.account.notifications.read')}}" method="post">
							@csrf
							<input type="hidden" value="all" name="notification_id">
							<button class="btn btn-sm btn-success">{{__("Mark all as Rea")}}</button>
						</form>
					</div>
					<table class="table table-condensed table-sm table-bordered">
						<thead>
						<tr>
							<th>#</th>
							<th>Contenu</th>
							<th>Envoyé le </th>
							<th>Action</th>
						</tr>
						<tbody>
						@foreach($notifications as $notification)
							<tr>
								<td>{{$loop->index +1}}</td>
								<td>{{$notification->data['message']??'-'}}</td>
								<td>{{$notification->created_at->diffForHumans()}}</td>
								<td>
									<form action="{{route('dashboard.account.notifications.read')}}" method="post">
										@csrf
										<input type="hidden" value="{{$notification->id}}" name="notification_id">
										<button class="btn btn-sm btn-secondary"><i class="bx bx-notification"></i></button>
									</form>
								</td>
							</tr>
						@endforeach
						</tbody>
						</thead>
					</table>
				</div>
			</div>
		</div>

</x-app-layout>
