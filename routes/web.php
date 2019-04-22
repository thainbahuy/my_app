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

//load view
Route::get('/', function() {
    return view('welcome');
});
Route::get('/addnew', function() {
    return view('addnew');
});

//controller
Route::get('/home','ProductController@index');
Route::get('/delete/{id}','ProductController@deleteById');
Route::get('/addNewProduct', 'ProductController@addNewProduct');

//--------------------------------------------------------------

//load view for Vuejs
Route::get('/products', function () {
    return view('HomeVueJs');
});

//call backend
Route::post('/products/store', 'ProductController@store');

Route::get('/products/getListProduct', 'ProductController@getListProduct');

Route::delete('products/{id}', 'ProductController@deleteById');
