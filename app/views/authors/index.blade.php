@extends('layout.admin')
@section('content')
	{{	Datatable::table()
			->addColumn('id', 'nama', '1', '2')
			->setOptions('aoColumnDefs', [
				['bVisible' => false, 'aTargets' => [0]],
				['sTitle' => 'Nama', 'aTargets' => [1]],
				['bSortable' => false, 'aTargets' => [2], 'sTitle'=>'Edit'],
				['bSortable' => false, 'aTargets' => [3], 'sTitle'=>'Hapus']
			])
			->setOptions('bProcessing', true)
			->setUrl(route('admin.authors.index'))
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