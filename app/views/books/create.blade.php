@extends('layout.admin')
@section('content')
	<div class="row">
		<div class="col s4 offset-s4">
			{{Form::open(['route'=>'admin.books.store', 'files' => 'true'])}}
				@include('books._form')
			{{Form::close()}}
		</div>
	</div>
@stop

@section('breadcrumb') 
 	Dashboard / <a href="{{route('admin.books.index')}}"> Buku </a> / {{$title}}
@stop
@section('head') 
	{{$title}} | Dashboard
@stop