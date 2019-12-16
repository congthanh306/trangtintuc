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
//admin


Route::group([
	'namespace' => 'Admin',
	'prefix'	=>'admin',
	'as'	=> 'admin.',
	'middleware' => ['checkLogin'],
], function(){
	//admin dashboard view
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	//staff management
	Route::group([
		'prefix' => 'staff',
		'as'	 => 'staff.'
	], function(){
		Route::get('/', 'StaffController@index')->name('index');
		// Route::get('/edit', 'StaffControllers@getEdit')->name('edit');
	});

	//category management
	Route::group([
		'prefix' => 'category',
		'as'	 => 'category.'
	], function(){
		Route::get('/', 'CategoryController@index')->name('index');
		Route::get('/create', 'CategoryController@create')->name('create');
		Route::post('/store', 'CategoryController@store')->name('store');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
		Route::post('/update/{id}', 'CategoryController@update')->name('update');
		Route::DELETE('/destroy/{id}', 'CategoryController@destroy')->name('destroy');
	});

	//news management
	Route::group([
		'prefix' => 'news',
		'as'	 => 'news.'
	], function(){
		Route::get('/', 'NewsController@index')->name('index');
		Route::get('/type/{id}', 'NewsController@getType')->name('type');
		Route::get('/search', 'NewsController@search')->name('search');
		Route::get('/show/{id}', 'NewsController@show')->name('show');
		Route::get('/create', 'NewsController@create')->name('create');
		Route::post('/store', 'NewsController@store')->name('store');
		Route::get('/edit/{id}', 'NewsController@edit')->name('edit');
		Route::post('/update/{id}', 'NewsController@update')->name('update');
		Route::DELETE('/destroy/{id}', 'NewsController@destroy')->name('destroy');
	});




});

Route::group([
	'namespace' => 'Admin',
	'as'	=> 'login.',
	'prefix'=> 'login',
], function(){
	Route::get('/', 'AdminLoginController@getLogin')->name('getlogin');
	Route::post('/login', 'AdminLoginController@login')->name('login');
	Route::get('/logout', 'AdminLoginController@logout')->name('logout');
});


Route::group([
	'namespace' => 'Client',
	'as'	=> 'client.',
	'prefix'=> 'client',
], function(){
	Route::get('/index', 'IndexController@index')->name('index');
	Route::get('/show/{id}', 'DetailNewsController@showDetail')->name('showdetail');
	Route::get('/type/{id}', 'TypeController@getType')->name('type');
	Route::get('/search', 'SearchController@search')->name('search');
	Route::post('/login', 'ClientLoginController@login')->name('login');
	Route::get('/logout', 'ClientLoginController@logout')->name('logout');
	Route::post('/comment', 'CommentController@postComment')->name('comment');
	Route::post('/destroycomment/{id}', 'CommentController@destroy')->name('destroycomment');
	Route::post('/editcomment/{id}', 'CommentController@editcomment')->name('commeditcommentent');
});


// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
