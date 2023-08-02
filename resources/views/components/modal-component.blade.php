@props(["id","title","backdrop"])
@php
	$backdrop = $backdrop??false;
@endphp
<div class="modal fade" id="{{$id}}" @if($backdrop) data-bs-backdrop="static"
	  data-bs-keyboard="false" @endif  aria-labelledby="staticBackdropLabel"
	  aria-hidden="true" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>
				{{$title}}
				</h4>
				<button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal"
						  aria-label="Close">
					<i class="fa fa-close"></i>
				</button>
			</div>
			<div class="modal-body">
				{{$slot}}
			</div>
		</div>
	</div>
</div>
