<?php

//check database
Route::get('/checkdb', function () {
    // return view('welcome');
    dd(DB::connection()->getDatabaseName());

});

//load view welcome
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

//Laravel +vuejs
Route::group(['middleware' => 'auth.app','prefix' => '/products'], function () {

    //controller execute
    Route::post('/store', 'ProductController@store');

    Route::get('/getListProduct', 'ProductController@getListProduct');

    Route::delete('/{id}', 'ProductController@deleteById');

    Route::put('/update/{id}','ProductController@updateData');
});
//controller load view
Route::get('/home','ProductController@index');


////////////////////////////////////////for login
//controller load view
Route::get('login', function() {
    return view('auth/login');
})->name('login');

//controller execute
Route::post('authenticate/login', 'AuthenticateController@index')->name('executelogin');

Route::get('authenticate/logout', 'AuthenticateController@logout')->name('executelogout');
