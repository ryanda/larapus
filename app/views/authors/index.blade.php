@extends('layout.admin')
@section('content')
	{{	Datatable::table()
			->addColumn('id', 'nama', '')
			->setOptions('aoColumnDefs', [
				['bVisible' => false, 'aTargets' => [0]],
				['sTitle' => 'Nama', 'aTargets' => [1]],
				['bSortable' => false, 'aTargets' => [2]]
			])
			->setOptions('bProcessing', true)
			->setUrl(route('admin.authors.index'))
			->render('partial.datatable') }}
	{{HTML::fab()}}
@stop

@section('asset')
	{{HTML::script('packages/datatables/js/jquery.dataTables.js')}} 
	{{HTML::style('packages/datatables/css/jquery.dataTables.css')}}
@stop
@section('breadcrumb') 
 	Dashboard / {{$title}}
@stop
@section('head') 
	{{$title}} | Dashboard
@stop