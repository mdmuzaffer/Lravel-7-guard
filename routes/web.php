<?php

use Illuminate\Support\Facades\Route;

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

Route::group( [ 'prefix' => 'admin' ], function(){
	
	Route::group(['middleware' => 'admin'], function(){
		Route::match(['get','post'],'/dashboard', 'AdminController@dashboard' );
	});

    Route::match(['get','post'],'/login', 'AdminController@login' );
    
    
});
