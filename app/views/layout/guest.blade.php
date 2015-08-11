@extends('layout.index')
@section('body')
	@yield('content')
@stop
@section('head')
Perpustakaan Online
@stop
@section('nav')
	<li><a href="{{url('login')}}"><i class="mdi-action-shop left"></i>Login</a></li>
	<li><a><i class="mdi-action-shop left"></i>Daftar</a></li>
@stop