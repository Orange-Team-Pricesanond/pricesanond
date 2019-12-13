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

Route::get('/tasks', function () {
    return view('yellowfile');
});
Route::get('/newtask', function () {
    return view('yellowfileInsert');
});

// Cliecnt
Route::get('deleteclient/{id}' , 'ClientController@delete');
Route::get('about', 'ClientController@index');
Route::post('/submitclient', 'ClientController@Submit');
Route::get('editclient/{id}', 'ClientController@view');
Route::post('submiteditclient', 'ClientController@edit');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Yellowfile
Route::get('tasks', 'yellowfileController@index');
