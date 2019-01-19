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
    return redirect('/dashboard');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	includeRouteFiles(__DIR__.DIRECTORY_SEPARATOR.'Backend'.DIRECTORY_SEPARATOR);
});



