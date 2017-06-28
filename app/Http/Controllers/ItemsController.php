<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;


class ItemsController extends Controller
{
	
	public function index()
	{
		$page_title = 'All Item';
		$items = Item::orderBy('created_at','DESC')->paginate(5);

		return view('items.index', compact('page_title', 'items'));
	}

   
	public function create()
	{
		
	}

	
	public function store(Request $request)
	{
		 $this->validate($request,[
			'item_name'			=> 'required|string',
			'category'			=> 'required|string'
		]);

		$item = Item::create($request->all());
		return redirect()->back()->with('message', 'Item has been added');
	}

	
	public function show($id)
	{
		
	}

   
	public function edit($id)
	{
		$item = Item::findOrFail($id);
		$page_title = $item->item_name;

		return view('items.edit', compact('page_title', 'item'));
	}

	
	public function update(Request $request, $id)
	{
		$this->validate($request,[
			'item_name' 		=> 'required|string',
			'category' 			=> 'required|string'			
		]);

		$item = Item::findOrFail($id);
		$item->update($request->all());

		return redirect()->route('items.index')->with('message', 'Item has been updated');
	}

	
	public function destroy($id)
	{
		Item::findOrFail($id)->delete();

		return redirect()->back()->with('message', 'Item has been deleted');
	}
}
