<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');

	public function getDates() {
		return ['created_at', 'updated_at', 'last_login'];
	}

	public function roles() {
		return $this->belongsToMany('Role', 'assigned_roles');
	}

	public function books() {
		return $this->belongsToMany('Book')->withPivot('returned')->withTimestamps();
	}
}
