@extends('layout.guest')
@section('content')
	<table>
		<thead>
			<tr>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Stok</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
		@foreach ($posts as $post)
			<tr>
				<td>{{$post->title}}</td>
				<td>{{$post->content}}</td>
				<td>1</td>
				<td>Pinjam Buku</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@stop