{{	
	Datatable::table()
		->addColumn('id', 'title', 'amount', 'stock', 'author', 'borrow')
		->setOptions('aoColumnDefs', [
			['bVisible' => false, 'aTargets' => [0]],
			['sTitle' => 'Judul', 'aTargets' => [1]],
			['sTitle' => 'Jumlah', 'aTargets' => [2]],
			['sTitle' => 'Stok', 'aTargets' => [3], 'bSortable' => false],
			['sTitle' => 'Penulis', 'aTargets' => [4]],
			['sTitle' => 'Borrow', 'aTargets' => [5], 'bSortable' => false],
		])
		->setOptions('bProcessing', true)
		->setUrl(route('list.borrow'))
		->render('partial._templatedatatable') 
}}