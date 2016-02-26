<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function() {
        return view('welcome');
    });

    /**
     * /app/docs
     *     - The documentation for the mobile app
     *     - Usage, installation, splash page...
     *
     * /api/docs
     *     - Developer docs
     *     - Usage, registering as developer...
     *     - Installation
     */
});

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {

    Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function() {

        Route::get('auth', [
            'uses' => 'AuthController@index',
            'as' => 'auth',
        ]);

        Route::post('auth', [
            'uses' => 'AuthController@authenticate',
        ]);

        require(app_path('Http/Routes/Api/v1/students.php'));
        require(app_path('Http/Routes/Api/v1/boards.php'));

    });

});
