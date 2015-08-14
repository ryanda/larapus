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
}