<?php

class BooksController extends \BaseController {

	public function index()
	{
		if(Datatable::shouldHandle()) {
			return Datatable::collection(Book::with('author')->orderBy('id','desc')->get())
				->showColumns('id', 'title', 'amount')
				->addColumn('author', function($model) {
					return $model->author->name;
				})
				->addColumn('1', function ($model) {
		$html = '<a href="'.route('admin.books.edit',$model->id).'" class="btn btnn"> <i class="mdi-editor-mode-edit"></i> </a>';
					return $html;
				})
				->addColumn('2', function ($model) {
		$html = Form::open(['route'=>['admin.books.destroy',$model->id],'method'=>'delete']);
		$html .= '<button class="btn btnn" type="submit"> <i class="mdi-action-delete"></i> </button>';
		$html .= Form::close();
					return $html;
				})
				-> searchColumns('title', 'amount', 'author')
				->orderColumns('title', 'amount', 'author')
				->make();
		}
		return View::make('books.index')->withTitle('Buku');
	}

	public function create() {
		return View::make('books.create')->withTitle('Tambah Buku');
	}

	public function store() {
		$validator = Validator::make($data = Input::all(), Book::$rules);
		if ($validator->fails()) {
			return Redirect::back()->withPesan('Terdapat kesalahan validasi')->withInput();
		}

		$book = Book::create($data);
		return Redirect::route('admin.books.index')->withPesan("Berhasil menyimpan $book->title");
	}

	public function show($id) {
		$book = Book::findOrFail($id);
		return View::make('books.show', compact('book'));
	}

	public function edit($id) {
		$book = Book::find($id);
		return View::make('books.edit', compact('book'));
	}

	public function update($id) {
		$book = Book::findOrFail($id);
		$validator = Validator::make($data = Input::all(), Book::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book->update($data);
		return Redirect::route('books.index');
	}

	public function destroy($id) {
		Book::destroy($id);
		return Redirect::route('books.index');
	}

}
