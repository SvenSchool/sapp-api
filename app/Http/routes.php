<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function() {
        return view('welcome');
    });

});

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {

    Route::get('/', [
        'uses' => 'ApiController@index',
        'as' => 'api.index',
    ]);

    require(app_path('Http/Routes/students.php'));

});
