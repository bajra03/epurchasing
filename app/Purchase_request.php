<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_request extends Model
{
    //
    protected $fillable = [
        'user_id',
    	'item_id',
    	'qty',
    	'remark'
    ];

    public function user()
    {

    	return $this->belongsTo('App\User');
    }

    public function quotations()
    {

        return $this->hasMany('App\Quotation', 'pr_id');
    }

   

    public function item()
    {

    	return $this->belongsTo('App\Item');
    }
}
