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
Route::get('/edityellow', function () {
    return view('yellowfiledit');
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
Route::get('newtask', 'yellowfileController@viewClient');
Route::post('/submityellowfile', 'yellowfileController@Submityf');
Route::get('appendAddress', 'yellowfileController@getAddress');
Route::get('edityellow/{id}', 'yellowfileController@view');
Route::post('/submitEdityellowfile', 'yellowfileController@edit');
Route::get('deleteYellow/{id}' , 'yellowfileController@delete');

//Masterfile
Route::get('masterpage', function(){
    return view('yellow_file.index');
});
Route::get('dailytime', function(){
    return view('daily_time_sheet.index');
});


Route::get('masterpage', 'yellowfileController@viewAddress');
Route::post('yellow_file_submit', 'yellowfileController@Master_yellow_submit');



