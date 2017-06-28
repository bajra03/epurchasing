<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_order extends Model
{
    protected $fillable =[

    	'pr_id',
    	'quotation_id',
    	'grand_total'

    ];

  
    public function purchase_request()
    {
    	return $this->belongsTo('App\Purchase_request', 'pr_id');
    }

    public function quotation()
    {
    	return $this->belongsTo('App\Quotation');
    }
}
