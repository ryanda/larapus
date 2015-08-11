<?php

class AuthorsController extends \BaseController {

	public function index() {
		$data = Author::all(['id','name']);
		// return $data;
		if(Datatable::shouldHandle()) {
			return Datatable::collection($data)
				->showColumns('id', 'name')
				->addColumn('', function ($model) {
					return 'edit | hapus';
				})
				->searchColumns('name')
				->orderColumns('name')
				->make();
		}
		return View::make('authors.index')->withTitle('Penulis')->withPesan('Authors');
	}

	public function create() {
		return View::make('authors.create');
	}

	public function store() {
		$validator = Validator::make($data = Input::all(), Author::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Author::create($data);

		return Redirect::route('authors.index');
	}

	public function show($id) {
		$author = Author::findOrFail($id);

		return View::make('authors.show', compact('author'));
	}

	public function edit($id)
	{
		$author = Author::find($id);

		return View::make('authors.edit', compact('author'));
	}

	public function update($id)
	{
		$author = Author::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Author::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$author->update($data);

		return Redirect::route('authors.index');
	}

	public function destroy($id)
	{
		Author::destroy($id);

		return Redirect::route('authors.index');
	}

}
