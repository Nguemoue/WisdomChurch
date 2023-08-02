<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
	@if($errors->any())
		<div class="text-center mx-auto">
			<x-auth-validation-errors :errors="$errors"/>
		</div>
	@endif
    <div class="py-12">
        <div class="card jumbotron jumbotron-fluid">
			<div class="card-body text-center">
				<div class="card-text">
					 {{__('message.welcome')}}
				</div>
			</div>
		</div>
    </div>
</x-app-layout>
