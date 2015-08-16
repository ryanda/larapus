<?php

class Book extends BaseModel {

	public static $rules = [
		'title' => 'required|unique:books,title,:id',
		'author_id' => 'required|exists:authors,id',
		'amount' => 'numeric',
		'cover' => 'image|max:2048'
	];
	protected $fillable = ['title', 'author_id', 'amount'];
	protected $appends = ['stock'];

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

		if ($this->stock == 0) {
			throw new BookOutOfStockException("Buku $this->title sudah tidak tersedia.");
		}
		
		return $this->users()->attach($user);
	}

	public function returnBack() {
		$user = Auth::user();
		// eloquent, bug in return book, use query builder instead
		// return $user->books()->updateExistingPivot($this->id, ['returned'=>1], true);

		DB::table('book_user')
			->where('book_id', $this->id)
			->where('user_id', $user->id)
			->where('returned', 0)
			->update([
				'returned'=>1, 
				'updated_at'=>$this->freshTimestamp()
			]);
	}

	public function getStockAttribute() {
		$borrowed = DB::table('book_user')
			->where('book_id', $this->id)
			->where('returned', 0)
			->count();
		$stock = $this->amount - $borrowed;
		return $stock;
	}
}