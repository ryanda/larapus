@extends('layout.admin')
@section('content')
	{{	Datatable::table()
			->addColumn('id', 'title', 'amount', 'author', 'borrow')
			->setOptions('aoColumnDefs', [
				['bVisible' => false, 'aTargets' => [0]],
				['sTitle' => 'Judul', 'aTargets' => [1]],
				['sTitle' => 'Jumlah', 'aTargets' => [2]],
				['sTitle' => 'Penulis', 'aTargets' => [3]],
				['bSortable' => false, 'aTargets' => [4], 'sTitle'=>'Borrow'],
			])
			->setOptions('bProcessing', true)
			->setUrl(route('member.books'))
			->render('partial._templatedatatable') }}
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