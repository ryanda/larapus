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
		return $this->users()->attach($user);
	}
}