{{	
	Datatable::table()
		->addColumn('id', 'title', 'amount', 'author', 'borrow')
		->setOptions('aoColumnDefs', [
			['bVisible' => false, 'aTargets' => [0]],
			['sTitle' => 'Judul', 'aTargets' => [1]],
			['sTitle' => 'Penulis', 'aTargets' => [2]],
			['sTitle' => 'Jumlah', 'aTargets' => [3]],
			['bSortable' => false, 'aTargets' => [4], 'sTitle'=>'Borrow'],
		])
		->setOptions('bProcessing', true)
		->setUrl(route('list.borrow'))
		->render('partial._templatedatatable') 
}}