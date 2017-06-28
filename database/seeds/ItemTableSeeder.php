<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
	
	public function run()
	{
		$item1	= Item::create([
			'item_name' 		=> 'Headset',
			'category'			=> 'other'
		]);

		$item2	= Item::create([
			'item_name' => 'Mouse',
			'category'	=> 'other'

		]);

		$item3	= Item::create([
			'item_name' => 'Keyboard',
			'category'	=> 'other'

		]);

		$item4	= Item::create([
			'item_name' => 'Printer tonner',
			'category'	=> 'other'

		]);

		$item5	= Item::create([
			'item_name' => 'Carrot',
			'category'	=> 'food'

		]);


	}
}
