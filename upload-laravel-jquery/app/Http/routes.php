<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::post('upload', 'HomeController@upload');
    Route::get('download/usuario/{userId}/file/{fileId}', 'HomeController@download');
    Route::get('destroy/usuario/{userId}/file/{fileId}', 'HomeController@destroy');
});
