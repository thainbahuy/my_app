<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Laravel +vuejs
Route::group(['prefix' => '/products'], function () {

    //controller execute
    Route::post('/store', 'ProductController@store');

    Route::get('/getListProduct', 'ProductController@getListProduct');

    Route::get('/edit/{id}', 'ProductController@getProductById');

    Route::delete('/{id}', 'ProductController@deleteById');

    Route::put('/update/{id}','ProductController@updateData');
});
