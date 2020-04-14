<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	//Route Stock Data Page
	Route::get('/stock', 'StockController@index')->name('stock');
	Route::get('/stock/input', 'StockController@create');
	Route::get('/stock/edit/{id}', 'StockController@edit');
	Route::get('/stock/view/{id}', 'StockController@show');

	Route::delete('/stock/delete/{id}', 'StockController@destroy');

	Route::post('/stock/new', 'StockController@store');
	Route::post('/stock/edit/{id}', 'StockController@update');

	//Route Tags Data Page
	Route::get('/tags', 'TagsController@index')->name('tags');
	Route::get('/tags/input', 'TagsController@create');
	Route::get('/tags/edit/{id}', 'TagsController@edit');
	
	Route::delete('/tags/delete/{id}', 'TagsController@destroy');

	Route::post('/tags/new', 'TagsController@store');
	Route::post('/tags/edit/{id}', 'TagsController@update');

	//Route Category Data Page
	Route::get('/categories', 'CategoryController@index')->name('category');
	Route::get('/categories/input', 'CategoryController@create');
	Route::get('/categories/edit/{id}', 'CategoryController@edit');
	
	Route::delete('/categories/delete/{id}', 'CategoryController@destroy');

	Route::post('/categories/new', 'CategoryController@store');
	Route::post('/categories/edit/{id}', 'CategoryController@update');

	//Route Photo Data Page
	Route::get('/photos', 'PhotoController@index')->name('photos');;
	Route::get('/photos/input_stockId', 'PhotoController@create')->name('choose_id');
	Route::get('/photos/edit/{id}', 'PhotoController@edit');
	
	Route::delete('/photos/delete/{id}', 'PhotoController@destroy');

	Route::post('/photos/input_photo', 'PhotoController@add_photo');
	Route::post('/photos/new', 'PhotoController@fileStore')->name('store_photo');
	Route::post('/photos/edit/{id}', 'PhotoController@update');
	
	Route::post('/photos/delete', 'PhotoController@fileDestroy');

	//Proses hasil select 2
	Route::get('/search/stock_id', function(){
		return App\Stock::where([['name','LIKE','%'.request('q').'%']])->paginate(10);
	});

});

