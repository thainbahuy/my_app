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
//check database
Route::get('/checkdb', function () {
    // return view('welcome');
    dd(DB::connection()->getDatabaseName());

});
//return view
Route::get('/home','AccountController@index');

Route::get('/addnew', function() {
    return view('addnew');
});


//controller crud
Route::get('/delete/{id}','AccountController@deleteById');

Route::get('/addNewAccount','AccountController@addNewData');

