<?php

class AuthorsController extends \BaseController {

	public function index() {
		$data = Author::all(['id','name']);
		// return $data;
		if(Datatable::shouldHandle()) {
			return Datatable::collection($data)
				->showColumns('id', 'name')
				->addColumn('', function ($model) {
					return '
					<a href="'.
					route('admin.authors.edit',['authors'=>$model->id]).
					'">edit</a> | hapus ';
				})
				->searchColumns('name')
				->orderColumns('name')
				->make();
		}
		return View::make('authors.index')->withTitle('Penulis');
	}

	public function create() {
		return View::make('authors.create')->withTitle('Tambah Penulis');
	}

	public function store() {
		$validator = Validator::make($data = Input::all(), Author::$rules);
		if ($validator->fails()) {
			return Redirect::back()->withPesan('Terdapat kesalahan validasi')->withInput();
		}

		$author = Author::create($data);
		return Redirect::route('admin.authors.index')->withPesan("Berhasil menyimpan $author->name");
	}

	public function show($id) {
		$author = Author::findOrFail($id);
		return View::make('authors.show', compact('author'));
	}

	public function edit($id) {
		$author = Author::find($id);
		return View::make('authors.edit', compact('author'))->withTitle("Ubah $author->name");
	}

	public function update($id) {
		$author = Author::findOrFail($id);
		$validator = Validator::make($data = Input::all(), $author->updateRules());
		if ($validator->fails()) {
			return Redirect::back()->withPesan('Terdapat kesalahan validasi')->withInput();
		}

		$author->update($data);
		return Redirect::route('admin.authors.index')->withPesan("Berhasil mengubah $author->name");
	}

	public function destroy($id) {
		Author::destroy($id);
		return Redirect::route('authors.index');
	}

}
