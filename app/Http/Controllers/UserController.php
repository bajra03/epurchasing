<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
Use Alert;


class UserController extends Controller
{
	
	public function index()
	{
		$page_title = 'All User';
		$users = User::orderBy('created_at','ASC')->paginate(5);

		return view('users.index', compact('page_title', 'users'));
	}


	public function create()
	{
		
	}

	
	public function store(Request $request)
	{
		$this->validate($request,[
				'name'      => 'required|string',
				'email'     => 'required|email|unique:users,email',
				'password'  => 'required|string|min:6',
				'role'      => 'required',
				'service'	=> 'string',
				'department'=> 'string',
				'position'  => 'string' 
			]);

		if($request->has('password')) {
			$data = $request->except('password');
			$data['password'] = bcrypt($request->password);
		} else {
			$data = $request->except('password');
		}

		$user = User::create($data);

		return redirect()->route('users.index')->with('message', 'User has been added');
	}

	
	public function show($id)
	{
		
	}


	public function edit($id)
	{
		$user = User::findOrFail($id);
		$page_title = $user->name;

		return view('users.edit', compact('page_title', 'user'));
	}


	public function update(Request $request, $id)
	{
		$this->validate($request,[
			'name' 		=> 'required|string',
			'email' 	=> 'required|string',
			'password' 	=> 'min:6',
			'role' 		=> 'required',
			'service'	=> 'string',
			'department'=> 'string',
			'position'	=> 'string'
		]);

		$data = [];

		if($request->has('password')) {
			$data = $request->all();
			$data['password'] = bcrypt($request->password);
		} else {
			$data = $request->except('password');
		}

		$user = User::findOrFail($id);
		$user->update($data);
		
		return redirect()->route('users.index')->with('message', 'User has been update');
	}


	public function destroy($id)
	{
		User::findOrFail($id)->delete();

		return redirect()->back()->with('message', 'User has been delete');
	}
}
