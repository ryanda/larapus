@extends('layout.guest')
@section('content')
	<h1>{{$title}}</h1>
	@include('books._borrowList')
@stop

@section('asset')
	@include('partial.datatable')
@stop