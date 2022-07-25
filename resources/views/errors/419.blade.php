{{-- @extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired')) --}}


@extends("errors.illustrated-layout")

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Cette page a expirer')) 

@section("image")
    <img   src="{{asset('images/event.jpg')}}" width="80%" height="70%" style="background-position: center center; object-fit: cover" class="mt-4 block img-fluid" alt="expired"  srcset="">
@endsection