@extends('layout.index')
@section('body')
	@yield('content')
@stop
@section('head')
Dashboard
@stop
@section('nav')
	@if (Auth::user()->hasRole("Admin"))
		{{HTML::actNav(route('admin'), 'Dashboard', 'mdi-action-settings')}}
		{{HTML::actNav(route('admin.books.index'), 'Buku', 'mdi-action-book')}}
		{{HTML::actNav(route('admin.authors.index'), 'Penulis')}}
		{{HTML::actNav('#', 'Member', 'mdi-maps-local-library')}}
		{{HTML::actNav('#', 'Peminjaman', 'mdi-action-shopping-cart')}}
	@endif
	@if (Auth::user()->hasRole("User"))
		{{HTML::actNav(route('admin'), 'Dashboard', 'mdi-action-settings')}}
		{{HTML::actNav(route('member.books'), 'Buku', 'mdi-action-book')}}
		{{HTML::actNav('#', 'Profil', 'mdi-action-assignment-ind')}}
	@endif
	
	<li><a><i class="mdi-action-account-circle left"></i>{{Auth::user()->name}}</a></li>
	<li><a href="{{url('logout')}}"><i class="mdi-action-lock left"></i>Logout</a></li>
@stop
@section('breadcrumb')
{{-- <div class="card-panel teal lighten-2 z-depth-2"> --}}
	<span>Dashboard</span>
{{-- </div> --}}
@stop