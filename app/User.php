<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	
	protected $fillable = [
		'name', 'email', 'password', 'role', 'department', 'position',
	];

	
	protected $hidden = [
		'password', 'remember_token',
	];

	public function purchase_request(){

		return $this->hasMany('App\Purchase_request');
	}

	public function quotation(){

		return $this->hasMany('App\Quotation');
	}

	public function purchase_order()
	{
		return $this->hasOne('App\purchase_order');
	}

	public function isAdmin(){
		return $this->role === 'administrator';
	}

	public function isSupplier(){
		return $this->role === 'supplier';
	}

	public function isUser(){
		return $this->role === 'staff';
	}
}
