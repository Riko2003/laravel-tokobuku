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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/create','UserController@create');
Route::get('/users/', [ 'as' => 'users.index', 'uses' => 'UserController@index']);
Route::get('/create/', [ 'as' => 'users.create', 'uses' => 'UserController@create']);
Route::get('/edit/{id}', [ 'as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('/update/{id}', [ 'as' => 'users.update', 'uses' => 'UserController@update']);
Route::post('/store/', [ 'as' => 'users.store', 'uses' => 'UserController@store']);
Route::POST('/destroy/{id}', [ 'as' => 'users.destroy', 'uses' => 'UserController@destroy']);
Route::resource('categories',  'CategoryController');
Route::resource('books',  'BookController');
Route::get('/ajax/categories/search',  'CategoryController@ajaxSearch');

Route::get('logout',function(){
    \Auth::logout();
    return redirect('/');
});
 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
