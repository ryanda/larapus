@extends('layout.admin')
@section('content')
	@include('books._borrowList')
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