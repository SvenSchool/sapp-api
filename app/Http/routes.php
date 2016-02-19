<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function() {
        return view('welcome');
    });
});

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {

    Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function() {

        require(app_path('Http/Routes/Api/v1/students.php'));
        require(app_path('Http/Routes/Api/v1/boards.php'));

    });

});
