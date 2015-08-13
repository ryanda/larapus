@extends('layout.admin')
@section('content')
	<div class="row">
		<div class="col s4 offset-s4">
			{{Form::model($author, ['route'=>['admin.authors.update', $author->id], 'method'=>'put'])}}
				@include('authors._form')
			{{Form::close()}}
		</div>
	</div>
@stop

@section('breadcrumb') 
 	Dashboard / <a href="{{route('admin.authors.index')}}"> Penulis </a> / {{$title}}
@stop
@section('head') 
	{{$title}} | Dashboard
@stop