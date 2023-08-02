
{{-- for error--}}
@if($errors->any())
	<script>
		let divErrors = ``;
		let iziToastErrors = iziToast.error({
			message: `
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>`,
			position: "topLeft"
		})
	</script>
@endif

{{-- for customize error --}}
@if(session()->has(\ReturnStatus::ERROR))
	<script>
		let divErrors = ``;
		let iziToastErrors = iziToast.error({
			message: `{!!  $errors !!}`,
			position: "topLeft"
		})
	</script>
@endif

{{-- for warning --}}


{{-- for info --}}


{{-- for success --}}
@if($_temp = session()->has(\ReturnStatus::SUCCESS))
	<script>
		let divSuccess = `{{session()->get(\ReturnStatus::SUCCESS)}}`;
		let iziToastSuccess = iziToast.success({
			message: `${divSuccess}`,
			position: "topLeft"
		})
	</script>
@endif
