<?php

class Book extends \Eloquent {

	public static $rules = [];
	protected $fillable = [];

	public function author() {
		return $this->belongsTo('Author');
	}
}