<?php

class BooksController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('user', ['only'=>['borrow']]);
	}

	public function borrow($id) {
		$book = Book::findOrFail($id);
		$book->borrow();
		return Redirect::back()->withPesan("Anda telah meminjam $book->title");
	}

	public function index() {
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

		$book = Book::create(Input::except('cover'));
		if (Input::hasFile('cover')) {
			$uploaded_cover = Input::file('cover');
			$extension = $uploaded_cover->getClientOriginalExtension();
			$filename = md5(time()). '.' .$extension;
			$destination_path = public_path(). DIRECTORY_SEPARATOR .'img';

			$uploaded_cover->move($destination_path, $filename);
			$book->cover = $filename;
			$book->save();
		}

		return Redirect::route('admin.books.index')->withPesan("Berhasil menyimpan $book->title");
	}

	public function show($id) {
		$book = Book::findOrFail($id);
		return View::make('books.show', compact('book'));
	}

	public function edit($id) {
		$book = Book::find($id);
		return View::make('books.edit', compact('book'))->withTitle("Ubah $book->title");
	}

	public function update($id) {
		$book = Book::findOrFail($id);
		$validator = Validator::make($data = Input::all(), $book->updateRules());
		if ($validator->fails()) {
			return Redirect::back()->withPesan('Terdapat kesalahan validasi')->withInput();
		}
		if (Input::hasFile('cover')) {
			$filename = null;
			$uploaded_cover = Input::file('cover');
			$extension = $uploaded_cover->getClientOriginalExtension();
			$filename = md5(time()). '.' .$extension;
			$destination_path = public_path(). DIRECTORY_SEPARATOR .'img';
			$uploaded_cover->move($destination_path, $filename);

			if ($book->cover) {
				$old_cover = $book->cover;
				$file_path = public_path(). DIRECTORY_SEPARATOR .'img'. DIRECTORY_SEPARATOR .$old_cover;
				try {
					File::delete($file_path);
				} catch (FileNotFoundException $e) {
					return Redirect::back()->withPesan('File tidak ditemukan')->withInput();
				}
			}

			$book->cover = $filename;
			$book->save();
		}

		if (!$book->update(Input::except('cover'))) {
			return Redirect::back();
		}

		return Redirect::route('admin.books.index')->withPesan("Berhasil mengubah $book->title");
	}

	public function destroy($id) {
		Book::destroy($id);
		return Redirect::route('admin.books.index')->withPesan('Berhasil menghapus buku');
	}

}
