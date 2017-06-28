<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index');
	Route::get('/quotation', 'PrController@quotation');
	Route::get('/supplier-recommendation', 'PrController@recommendation');
	Route::get('/purchase_request/{id}', ['uses' => 'QuotationController@create_quotation' , 'as' => 'quotations.add']);
	Route::get('/process_pr/{id}', ['uses' => 'PrController@process_pr', 'as' => 'pr.process']);
	Route::get('/po', ['uses' => 'PoController@index', 'as' => 'po.index']);

	Route::post('/process_po', ['uses' => 'PrController@process_po', 'as' => 'po.process']);

	Route::resource('users', 'UserController', ['except' => 'show']);
	Route::resource('items', 'ItemsController', ['except' => 'show']);
	Route::resource('pr', 'PrController');
	Route::resource('quotations', 'QuotationController', ['except' => 'show']);

});
