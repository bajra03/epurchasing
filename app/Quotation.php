<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
	protected $fillable = [

		'pr_id',
		'user_id',
		'price',
		'top',
		'payment_method',
		'garantee',
		'k1',
		'k2',
		'k3',
		'k4',
		'k5',
		'score'
	];

	protected $hidden = ['created_at', 'updated_at'];

	public function purchase_request()
	{

		return $this->belongsTo('App\Purchase_request', 'pr_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function purchase_order()
	{
		return $this->hasOne('App\purchase_order');
	}
}
