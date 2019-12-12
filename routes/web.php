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

Route::get('/about', function () {
    return view('about');
});
Route::get('/insertclient', function () {
    return view('clientinert');
});
Route::get('/editclient', function () {
    return view('clientedit');
});

// Cliecnt
Route::get('deleteclient/{id}' , 'ClientController@delete');
Route::get('about', 'ClientController@index');
Route::post('/submitclient', 'ClientController@Submit');
Route::get('editclient/{id}', 'ClientController@view');
Route::post('submiteditclient', 'ClientController@edit');

Route::get('insertclient', 'ClientController@viewProvince');

Route::post('getDistrict', 'ClientController@getDistrict');
Route::post('getSubdistrict', 'ClientController@getSubdistrict');
Route::post('getPostal', 'ClientController@getPostal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
