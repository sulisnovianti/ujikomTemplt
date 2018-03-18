<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'FrontController@index');
Route::get('/pinjam/{id}', 'FrontController@pinjam');
Route::get('/kembali/{id}', 'FrontController@kembali');
Route::get('query', 'CariController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/statistik', 'HomeController@statistik');

Route::get('/admin/barangslab', 'BarangsController@lab',[
		'middleware' => ['auth', 'role:lab']]);

Route::get('/admin/barangsbengkel', 'BarangsController@bengkel',[
		'middleware' => ['auth', 'role:bengkel']]);

Route::get('data','HomeController@search');

Route::get('/user', function(){
	return view('welcome');
});

Route::get('/dashboard', 'statistikController@pinjaman');
Route::post('/search','FrontController@search');


Route::group(['middleware' => 'web'], function () {
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']], function () {
	//Route diisi disini ...
	Route::resource('barangs','BarangsController');
	Route::resource('barangslab','BarangsLabController');
	Route::resource('barangsbengkel','BarangsBengkelController');
	Route::resource('user','userController');

	Route::get('barangs/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);

	Route::get('barangslab/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:lab|admin']], function () {
	//Route diisi disini ...
	Route::resource('barangslab','BarangsLabController');

	Route::get('barangs/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);

	Route::get('barangslab/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);
});

Route::group(['prefix'=>'admin','middleware'=>['auth','role:bengkel|admin']], function () {
	//Route diisi disini ...
	Route::resource('barangsbengkel','BarangsbengkelController');

	Route::get('barangs/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);

	Route::get('barangslab/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);
});

Route::group(['prefix'=>'member','middleware'=>['auth','role:member']], function () {
	//Route diisi disini ...
	Route::get('daftarpinjaman','FrontController@daftarpinjaman');
	Route::get('barangs/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);

	Route::get('barangslab/{barang}/borrow',[
		'middleware' => ['auth', 'role:member'],

		'as' => 'guest.barangs.borrow',
		'uses' => 'FrontController@pinjam' 

		]);
});


});

