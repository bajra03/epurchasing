<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		$administrator	 = User::create([

			'name'		=> 'Bajra',
			'email'		=> 'bajra@epurchasing.com',
			'password'	=> bcrypt('secret'),
			'role'		=> 'administrator',
			'department'=> 'accounting',
			'position'	=> 'manager'

		]);

	 	$purchasing 	= User::create([

	 		'name'		=> 'Purchasing test',
	 		'email'		=> 'purchasing@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'purchasing',
	 		'department'=> 'accounting',
	 		'position'	=> 'supervisor'
	 	]);

	 	$supervisor		= User::create([
	 		'name'		=> 'Supervisor',
	 		'email'		=> 'supervisor@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'staff',
	 		'department'=> 'engineering',
	 		'position'	=> 'staff'
	 	]);

	 	$supplier		= User::create([
	 		'name' 		=> 'Supplier 1',
	 		'email'		=> 'supplier1@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);

	 	$supplier2		= User::create([
	 		'name' 		=> 'Supplier 2',
	 		'email'		=> 'supplier2@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);

	 	$supplier3		= User::create([
	 		'name' 		=> 'Supplier 3',
	 		'email'		=> 'supplier3@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);

	 	$supplier4		= User::create([
	 		'name' 		=> 'Supplier 4',
	 		'email'		=> 'supplier4@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);

	 	$supplier5		= User::create([
	 		'name' 		=> 'Supplier 5',
	 		'email'		=> 'supplier5@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);

	 	$supplier6		= User::create([
	 		'name' 		=> 'Supplier 6',
	 		'email'		=> 'supplier6@epurchasing.com',
	 		'password'	=> bcrypt('secret'),
	 		'role'		=> 'supplier'
	 	]);
	}
}
