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
Route::post('/drinker', 'DrinkerController@store');
Route::get('/drinks', 'DrinksController@index');
Route::post('/drinks', 'DrinksController@store');
Route::get('/history', 'DrinkerController@index')->name('history');
Route::delete('drinkers/{drink}','DrinkerController@destroy');
Route::get('/allowance', 'DrinksController@allowance');
Route::get('/autoselect', 'DrinksController@autoselect');
Route::get('/drinks/create', 'DrinksController@create');
Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'DrinksController@add')->name('create');

