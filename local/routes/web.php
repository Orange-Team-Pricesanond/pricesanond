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
// use MemberAdmin.php

Route::group(['middleware' => 'auth'], function(){


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
    Route::get('about', 'ClientController@index');
    Route::post('/submitclient', 'ClientController@Submit');
    Route::get('editclient/{id}', 'ClientController@view');
    Route::post('submiteditclient', 'ClientController@edit');

    // Route::get('/home', 'HomeController@index')->name('home');
    //Yellowfile
    Route::get('tasks', 'yellowfileController@index');
    Route::get('newtask', 'yellowfileController@viewClient');
    Route::post('/submityellowfile', 'yellowfileController@Submityf');
    Route::get('appendAddress', 'yellowfileController@getAddress');
    Route::get('edityellow/{id}', 'yellowfileController@view');
    Route::post('/submitEdityellowfile', 'yellowfileController@edit');
    Route::get('deleteYellow' , 'yellowfileController@delete');

    //----------------------- Masterfile --------------------------------

    Route::get('masterpage', function(){
        return view('yellow_file.index');
    });
    Route::get('dailytime', function(){
        return view('daily_time_sheet.index');
    });

    Route::get('masterpage', 'yellowfileController@viewAddress');
    Route::post('yellow_file_submit', 'yellowfileController@Master_yellow_submit');
    Route::post('yellow_file_edit', 'yellowfileController@Master_yellow_edit');
    Route::get('deleteclient/{id}' , 'ClientController@delete');

    Route::get('/viewclient', function () {
        return view('client_edit');
    });
    Route::get('insertclient2', function () {
        return view('yellow_file.client_insert');
    });

    Route::get('getYellow', 'yellowfileController@getYellow');
    Route::get('viewclient/{id}', 'yellowfileController@editcl');
    Route::post('clientEditsumit', 'yellowfileController@editSubmit');
    Route::post('clientinsertsubmit', 'yellowfileController@Submitcl');
    Route::post('yellow_edit_rate', 'yellowfileController@rates');

    // New
    Route::get('yellow-file/{id}', 'yellowfileController@showyellow');


    //----------------------- TimeSheet --------------------------------

    Route::get('dailytime', 'TimeController@index');
    Route::get('timeseetview/{id}', 'TimeController@viewsheet');
    Route::get('timesheetadd', 'TimeController@viewsheetadd');
    Route::get('deletetimesheet/{id}', 'TimeController@delete');
    Route::get('deletetimesheetAjax', 'TimeController@deleteAjax');
    Route::post('timesheetInsert', 'TimeController@insert');
    Route::get('selectTime', 'TimeController@selectTimeAjax');
    Route::get('selectFixFee', 'TimeController@selectFixFeeAjax');
    Route::get('showtimesheet', 'TimeController@showtimesheet');
    Route::post('searchtimesheet', 'TimeController@searchtimesheet');
    Route::post('showDetaileTimesheet', 'TimeController@showDetaileTimesheet');
    Route::post('edittimesheet', 'TimeController@edittimesheet');
    Route::get('getTextConfirm', 'TimeController@getTextConfirmAjax');

    // ---------------------------- Personal ---------------------------

    Route::get('personal', 'PersonalController@index');
    Route::get('getPersonal', 'PersonalController@getPersonal');
    Route::post('inserpersonal', 'PersonalController@inserpersonal');
    Route::get('deletepersonal', 'PersonalController@delete');
    Route::post('updatepersonal', 'PersonalController@update');

});

//----------------------- Login --------------------------------
Auth::routes();
Route::get('/', function () {
    return view('login');
});
// Route::get('/login2', function () {
//     return view('login');
// });
Route::get('/recover_password', function () {
    return view('recover_password');
});
//--------------------------------------------------------------
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
