<?php

class AuthorsController extends \BaseController {

	public function index() {
		$data = Author::all(['id','name']);
		if(Datatable::shouldHandle()) {
			return Datatable::collection($data)
				->showColumns('id', 'name')
				->addColumn('1', function ($model) {
		$html = '<a href="'.route('admin.authors.edit',$model->id).'" class="btn btnn"> <i class="mdi-editor-mode-edit"></i> </a>';
					return $html;
				})
				->addColumn('2', function ($model) {
		$html = Form::open(['route'=>['admin.authors.destroy',$model->id],'method'=>'delete']);
		$html .= '<button class="btn btnn" type="submit"> <i class="mdi-action-delete"></i> </button>';
		$html .= Form::close();
					return $html;
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
		return Redirect::route('admin.authors.index')->withPesan('Berhasil menghapus penulis');
	}

}
