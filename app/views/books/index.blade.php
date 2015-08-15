@extends('layout.admin')
@section('content')
	{{	Datatable::table()
			->addColumn('id', 'title', 'author', 'amount', '1', '2')
			->setOptions('aoColumnDefs', [
				['bVisible' => false, 'aTargets' => [0]],
				['sTitle' => 'Judul', 'aTargets' => [1]],
				['sTitle' => 'Penulis', 'aTargets' => [2]],
				['sTitle' => 'Jumlah', 'aTargets' => [3]],
				['bSortable' => false, 'aTargets' => [4], 'sTitle'=>'Edit'],
				['bSortable' => false, 'aTargets' => [5], 'sTitle'=>'Hapus']
			])
			->setOptions('bProcessing', true)
			->setUrl(route('admin.books.index'))
			->render('partial._templatedatatable') }}
	{{HTML::fab()}}
@stop

@section('asset')
	@include('partial.datatable')
@stop
@section('breadcrumb') 
 	Dashboard / {{$title}}
@stop
@section('head') 
	{{$title}} | Dashboard
@stop