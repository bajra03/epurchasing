<?php

namespace App\Http\Controllers;

use App\Item;
use App\Purchase_request;
use App\Quotation;
use App\User;
use App\Purchase_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrController extends Controller
{
	
	public function index()
	{
		$page_title ='All Purchase Request';
		$purchase_requests = Purchase_request::orderBy('created_at', 'DESC')->paginate(5);
		$items = Item::pluck('item_name', 'id');

		$pr_view = null;
		if(Auth::user()->role !== 'staff')
		{
			$pr_view = Purchase_request::orderBy('created_at', 'DESC')->paginate(5);
		} else 
		{
			$pr_view = Purchase_request::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get();
		}


		return view('pr.index', compact('page_title', 'purchase_requests', 'items', 'pr_view'));
	}

   
	public function create()
	{
		//
	}


	public function store(Request $request)
	{
		$this->validate($request,[
			'qty'			=> 'required|integer',
			'remark'		=> 'required|string'
		]);


		$item = Purchase_request::create($request->all());
		
		return redirect()->route('pr.index')->with('message', 'Purchase request has been added');
	}

	
	public function show($id)
	{

		$page_title = 'Detail PR';
		$pr = Purchase_request::find($id);
		$quotations =$pr->quotations;
		
		$quote_view = null;

		if(Auth::user()->role !== 'supplier'){

			$quote_view = Purchase_request::find($id)->quotations;

		} 
		else {

			$quote_view = Purchase_request::find($id)->quotations()->where('user_id', Auth::user()->id)->get();
		}
		
		return view('pr.show', compact('page_title', 'pr', 'quotations', 'quote_view'));
	}

	
	public function edit($id)
	{
		$pr = Purchase_request::findOrFail($id);
		$items = Item::pluck('item_name', 'id');
		
		$page_title = 'Edit PR';

		return view('pr.edit', compact('page_title', 'pr', 'items'));
	}

	
	public function update(Request $request, $id)
	{
		$this->validate($request,[
			'qty'			=> 'required|integer',
			'remark'		=> 'required|string'
		]);

		$pr = Purchase_request::findOrFail($id);

		$pr->update($request->all());

		return redirect()->route('pr.index')->with('message', 'Purchase request has been updated');
	}

	public function process_pr($id)
	{
		$page_title = 'Recommendation Supplier';

		$purchase_requests = Purchase_request::find($id);
		

		$quotations = Purchase_request::find($id)->quotations()->orderBy('score', 'DESC')->get();	

		$supplier_list = Purchase_request::find($id)->quotations;

		$reduce = $supplier_list->reduce(
			function($current, $next){
				 $current[$next->id] = $next->user->name;

				return $current;
			},[]);
		
		return view('quotations.recommendation', compact('page_title', 'purchase_requests', 'quotations', 'supplier_list', 'reduce'));
	}

	public function process_po(Request $request)
	{
		
		$data = $request->except('_token');

		$pr = Purchase_request::find($request->pr_id);
		$quote = $pr->quotations()->where('id', $request->quotation_id)->first();

		$data['grand_total'] = $pr->qty * $quote->price;
		
		$po = Purchase_order::create($data);
		
		return redirect()->route('po.index')->with('message', 'Purchase order has been generate successfuly');
	}
   
	public function destroy($id)
	{
		Purchase_request::findOrFail($id)->delete();

		
		return redirect()->back()->with('message', 'Purchase request has been delete');
	}

}
