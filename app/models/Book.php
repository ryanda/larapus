<?php

class Book extends BaseModel {

	public static $rules = [
		'title' => 'required|unique:books,title,:id',
		'author_id' => 'required|exists:authors,id',
		'amount' => 'numeric',
		'cover' => 'image|max:2048'
	];
	protected $fillable = ['title', 'author_id', 'amount'];

	public function author() {
		return $this->belongsTo('Author');
	}

	public function users() {
		return $this->belongsToMany('User')->withPivot('returned')->withTimestamps();
	}

	public function borrow() {
		$user = Auth::user();
		if ($user->books()->wherePivot('book_id',$this->id)->wherePivot('returned', 0)->count() > 0) {
			throw new BookAlreadyBorrowedException("Buku $this->title sedang Anda pinjam.");
		}
		
		return $this->users()->attach($user);
	}
}