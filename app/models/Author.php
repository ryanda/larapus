<?php

class Author extends BaseModel {

	public static $rules = [ 'name' => 'required|unique:authors,name,:id' ];
	protected $fillable = ['name'];

	public function books() {
		return $this->hasMany('Book');
	}

	public static function boot() {
		parent::boot();
		
		self::deleting(function($author) {
			if ($author->books->count() > 0) {
				$html = [];
				$html[0] =  'Penulis tidak bisa dihapus karena masih memiliki buku : ';
				foreach ($author->books as $key=>$book) {
					$key = $key+1;
					$html[$key] = "$key. $book->title";
				}
				Session::flash('pesan', $html);
				return false;
			}
		});
	}
}