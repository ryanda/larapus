<?php

class Author extends BaseModel {

	public static $rules = [ 'name' => 'required|unique:authors,name,:id' ];
	protected $fillable = ['name'];
}