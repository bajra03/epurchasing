<?php

namespace App\Http\Controllers;

use App\Purchase_order;
use Illuminate\Http\Request;

class PoController extends Controller
{
	public function index()
	{
		$page_title = 'List PO';
		$purchase_orders = Purchase_order::orderBy('created_at', 'DESC')->paginate(5);

		return view('po.index', compact('page_title', 'purchase_orders'));
	}

	public function destroy($id)
	{
		Purchase_order::findOrFail($id)->delete();

		return redirect()->back()->with('message', 'Purchase order has been delete');
	}
}
