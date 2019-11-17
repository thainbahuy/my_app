<?php
//--------------------------------------------------------------
Route::get('/','ProductController@index');
//Laravel +vuejs
Route::group(['prefix' => '/products'], function () {

    //controller execute
    Route::post('/store', 'ProductController@store');

    Route::get('/getListProduct', 'ProductController@getListProduct');

    Route::delete('/{id}', 'ProductController@deleteById');

    Route::put('/update/{id}','ProductController@updateData');
});


