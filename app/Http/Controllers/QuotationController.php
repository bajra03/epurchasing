<?php

namespace App\Http\Controllers;

use App\Purchase_request;
use App\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
	
	public function index()
	{
		
	}


	public function create()
	{
		
	}


	public function create_quotation($id){

		$page_title = 'Craete quotation';
		$pr = Purchase_request::findOrFail($id);

		return view('quotations.create', compact('page_title', 'pr'));
	}


	public function store(Request $request)
	{
		$this->validate($request, [
			'price'		=> 'required|integer',
			'top'		=> 'required|integer',
			'payment_method'	=> 'required|string',
			'garantee'	=> 'required|integer'

		]);

		$top 	= $request->top;
		$payment_method = $request->payment_method;
		$garantee = $request->garantee;
		
		$data 	= $request->except('_token');
		

		//give the Term Of Payment criteria 
		if($top >= 30)
		{
			$data['k2'] = 1;
		}else if($top < 30 && $top >= 20)
		{
			$data['k2'] = 0.75;
		}else if($top < 20 && $top >= 14)
		{
			$data['k2'] = 0.50;
		}else if($top < 14 && $top >= 7)
		{
			$data['k2'] = 0.25;
		}else
		{
			$data['k2'] = 0;
		}

		//give the Paymen Method criteria
		if($payment_method === 'credit')
		{
			$data['k3'] = 1;
		}else
		{
			$data['k3'] = 0.75;
		}

		//give the Garantee criteria
		if($garantee >= 30)
		{
			$data['k4'] = 1;
		}else if($garantee < 30 && $garantee >= 20)
		{
			$data['k4'] = 0.75;
		}else if($garantee < 20 && $garantee >= 14)
		{
			$data['k4'] = 0.50;
		}else if($garantee < 14 && $garantee >=7 )
		{
			$data['k4'] = 0.25;
		}else
		{
			$data['k4'] = 0;
		}

		//give criteria to service with counting the quotation in purchase request
		$count = Purchase_request::find($request->pr_id)->quotations()->count();

		if($count === 0)
		{
			$data['k5'] = 1;
		}else if($count === 1)
		{
			$data['k5'] = 0.75;
		}else if($count === 2)
		{
			$data['k5'] = 0.50;
		}else if($count === 3)
		{
			$data['k5'] = 0.25;
		}else
		{
			$data['k5'] = 0;
		}
	
		
		
		$quotations = Purchase_request::find($request->pr_id)->quotations->toArray();

		
		$data_sorted = $this->buildNewData($request->pr_id, $quotations, $data);
		
		
		//save to Quotation model
		foreach($data_sorted as $data) {
			if (!array_key_exists('id', $data)) {
				$add = Quotation::insert($data);
			} else {
				$quotation = Quotation::find($data['id'])->update($data);
			}
		}

		return redirect()->route('pr.index')->with('message', 'Quotation has been added');
	}

	private function buildNewData($id, $list, $new_data) {    
	
		// if (!is_array($list) || !is_array($new_data)) {
		// 	return;
		// }
		
		// $list[] = $new_data;
		
		// usort($list, function($a, $b) {
		// 	return $a['price'] - $b['price'];
		// });

		// $jumlah = Purchase_request::find($id)->quotations()->count();		
		
		// $map_score = array_map(function ($data, $index) use ($jumlah){
			
		// 	if ($jumlah === 0){
				
		// 		$data['k1'] = 1;
				
		// 	}else if($jumlah !== 0 && $index === ($jumlah - 1) ){
		// 		// dd($jumlah, $index);
		// 		$data['k1'] = 0;
				
		// 	}else{
				
		// 		$data['k1'] = 1 / ($jumlah - 1) * ($jumlah - ($index + 1));

		// 	}
		// 	//scoring
		// 	$data['score'] = ($data['k1'] + $data['k2'] + $data['k3'] + $data['k4'] + $data['k5']) / 5;
		// 	return $data;
		// }, $list, array_keys($list));		
		// return $map_score;

		if (!is_array($list) || !is_array($new_data)) {
		  return;
		}
		
		
		$list[] = $new_data;
		
		usort($list, function($a, $b) {
		  return $a['price'] - $b['price'];
		});
		
		$map_score = array_map(function ($data, $index) {
			$data['k1'] = (4 - $index) * 0.25;
			//scoring
			$data['score'] = ( $data['k1'] + $data['k2'] + $data['k3'] + $data['k4'] + $data['k5']) / 5;
		 	return $data;
		}, $list, array_keys($list));
		
		return $map_score;
	}


	public function show($id)
	{
		
	}

	
	public function edit($id)
	{
		$quotations = Quotation::findOrFail($id);
		$pr = Quotation::find($id)->purchase_request;
	
		$page_title = 'Edit Quotation';

		return view('quotations.edit', compact('page_title', 'quotations', 'pr'));
	}

	public function update(Request $request, $id)
	{
		$this->validate($request,[
			'price'			=> 'required',
			'top'			=> 'required',
			'payment_method'			=> 'required',
			'garantee'		=> 'required'
		]);
		$quotations = Quotation::findOrFail($id);

		$top 	= $request->top;
		$payment_method = $request->payment_method;
		$garantee = $request->garantee;
		$data 	= $request->except('_token');

		
		//give the Term Of Payment criteria 
		if($top >= 30)
		{
			$data['k2'] = 1;
		}else if($top < 30 && $top >= 20)
		{
			$data['k2'] = 0.75;
		}else if($top < 20 && $top >= 14)
		{
			$data['k2'] = 0.50;
		}else if($top < 14 && $top >= 7)
		{
			$data['k2'] = 0.25;
		}else
		{
			$data['k2'] = 0;
		}

		//give the Paymen Method criteria
		if($payment_method === 'credit')
		{
			$data['k3'] = 1;
		}else
		{
			$data['k3'] = 0.75;
		}

		//give the Garantee criteria
		if($garantee >= 30)
		{
			$data['k4'] = 1;
		}else if($garantee < 30 && $garantee >= 20)
		{
			$data['k4'] = 0.75;
		}else if($garantee < 20 && $garantee >= 14)
		{
			$data['k4'] = 0.50;
		}else if($garantee < 14 && $garantee >=7 )
		{
			$data['k4'] = 0.25;
		}else
		{
			$data['k4'] = 0;
		}


		$quotations = Purchase_request::find($request->pr_id)->quotations()->where('id', '<>', $id)->get()->toArray();


		$data_sorted = $this->buildNewData($quotations, $data);
		// dd($data_sorted);

		
		//save to model Quotation
		foreach($data_sorted as $data) {
		Quotation::find($data ['id'])->update($data);
		}
		
		$pr_id = $request->pr_id;

		return redirect()->route('pr.show',  ['pr' => $pr_id])->with('message', 'Quotation has been updated');
	}



	
	public function destroy($id)
	{
		Quotation::findOrFail($id)->delete();

		return redirect()->back()->with('message', 'Quotation has been delete');
	}
}
