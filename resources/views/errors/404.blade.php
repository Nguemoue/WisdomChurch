@extends("errors.illustrated-layout")

@section('title', __('Not Found'))


@section('code', '404')

@section('message', __('Resource Demande inexistante')) 

@section("image")
    <img   src="{{asset('images/event.jpg')}}" width="80%" class="mt-4 block" alt="de" sizes="123,1230" srcset="">
@endsection