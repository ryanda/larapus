@extends('layout.admin')
@section('content')
	@include('books._borrow')
@stop

@section('asset')
	@include('partial.datatable')
@stop
@section('breadcrumb') 
 	{{$title}}
@stop
@section('head') 
	{{$title}}
@stop