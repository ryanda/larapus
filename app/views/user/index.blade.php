@extends('layout.admin')
@section('nava')
	<li><a><i class="mdi-action-shop left"></i>Dashboard</a></li>
	<li><a><i class="mdi-action-shop left"></i>Buku</a></li>
	<li><a><i class="mdi-action-shop left"></i>Profil</a></li>
@stop
@section('content')
@if ($books->count() == 0)
	Tidak ada buku yang dipinjam
@else
	<table>
		<thead>
			<tr>
				<td>Buku dipinjam</td>
				<td>Kembalikan</td>
			</tr>
		</thead>
		<tbody>
		@foreach($books as $book)
			<tr>
				<td>{{$book->title}}</td>
				<td><a href="{{route('books.return', $book->id)}}" class="btn btnn"> <i class="mdi-action-bookmark"></i> </a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endif
@stop