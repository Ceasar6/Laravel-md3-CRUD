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
Route::prefix('customers')->group(function (){
    Route::get('/','CustomerController@index')->name('customers.index');
    Route::get('/add','CustomerController@create')->name('customers.create');
    Route::post('/add','CustomerController@add')->name('customers.add');
    Route::get('/{id}/update','CustomerController@getID')->name('customers.edit');
    Route::post('/{id}/update','CustomerController@update')->name('customers.update');
    Route::get('/{id}/delete','CustomerController@delete')->name('customers.delete');

});
Route::prefix('cities')->group(function (){
    Route::get('/','CityController@index')->name('cities.index');
    Route::get('/create','CityController@create')->name('cities.create');
    Route::post('/create','CityController@add')->name('cities.add');
});
