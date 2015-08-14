@extends('layout.admin')
@section('content')
	<div class="row">
		<div class="col s4 offset-s4">
			{{Form::open(['route'=>'admin.authors.store'])}}
				@include('authors._form')
			{{Form::close()}}
		</div>
	</div>
@stop

@section('breadcrumb') 
 	Dashboard / <a href="{{route('admin.authors.index')}}"> Buku </a> / {{$title}}
@stop
@section('head') 
	{{$title}} | Dashboard
@stop