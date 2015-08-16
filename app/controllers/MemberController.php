<?php

class MemberController extends \BaseController {
	public function books() {
		if(Datatable::shouldHandle()) {
			return Datatable::collection(Book::with('author')->orderBy('id','desc')->get())
				->showColumns('id', 'title', 'amount', 'stock')
				->addColumn('author', function($model) {
					return $model->author->name;
				})
				->addColumn('borrow', function ($model) {
		$html = '<a href="'.route('books.borrow',$model->id).'" class="btn btnn"> <i class="mdi-action-grade"></i> </a>';
					return $html;
				})
				->searchColumns('title', 'amount', 'author')
				->orderColumns('title', 'amount', 'author')
				->make();
		}
		return View::make('books.borrow')->withTitle('Pilih Buku');
	}

	public function borrowList() {
		if(Datatable::shouldHandle()) {
			return Datatable::collection(Book::with('author')->orderBy('id','desc')->get())
				->showColumns('id', 'title', 'amount', 'stock')
				->addColumn('author', function($model) {
					return $model->author->name;
				})
				->addColumn('borrow', function ($model) {
		$html = '<a href="'.route('books.borrow',$model->id).'" class="btn btnn"> <i class="mdi-action-grade"></i> </a>';
					return $html;
				})
				->searchColumns('title', 'amount', 'author')
				->orderColumns('title', 'amount', 'author')
				->make();
		}
	}
}