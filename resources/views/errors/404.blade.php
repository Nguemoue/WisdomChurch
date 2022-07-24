 {{-- @extends('errors::minimal') --}}



@extends("errors.illustrated-layout")

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Cette page n\'existe pas')) 

@section("image")
    <img   src="{{asset('images/event.jpg')}}" width="80%" class="mt-4 block" alt="de" sizes="123,1230" srcset="">
@endsection