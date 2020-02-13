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

// [POC] Handle view
Route::get('/', 'POC\HandleUploadController@show');
Route::post('save', 'POC\HandleUploadController@post');
// [POC] END


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('test-middleware', 'API\TestMiddleware@getResponse')
    ->middleware('checkAge');
