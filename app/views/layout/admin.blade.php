@extends('layout.index')
@section('body')
	@yield('content')
@stop
@section('head')
Admin Dashboard
@stop
@section('nav')
	@yield('nava')
	<li><a><i class="mdi-action-account-circle left"></i>{{Auth::user()->name}}</a></li>
	<li><a href="{{url('logout')}}"><i class="mdi-action-lock left"></i>Logout</a></li>
@stop
@section('breadcrumb')
{{-- <div class="card-panel teal lighten-2 z-depth-2"> --}}
	<span>Dashboard</span>
{{-- </div> --}}
@stop