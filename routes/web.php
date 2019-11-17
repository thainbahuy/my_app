<?php
//controller
Route::get('/home','ProductController@index');
Route::get('/delete/{id}','ProductController@deleteById');
Route::get('/addNewProduct', 'ProductController@addNewProduct');

//--------------------------------------------------------------

//Laravel +vuejs
Route::group(['prefix' => '/products'], function () {

    //controller execute
    Route::post('/store', 'ProductController@store');

    Route::get('/getListProduct', 'ProductController@getListProduct');

    Route::delete('/{id}', 'ProductController@deleteById');

    Route::put('/update/{id}','ProductController@updateData');
});
//controller load view
Route::get('/home','ProductController@index');

