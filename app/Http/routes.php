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
    Route::get('create/{role}', function($role) {
        \Bouncer::allow($role)->to('create', \App\Group::class);
    });
});

Route::group(['middleware' => ['api'], 'prefix' => 'api', 'namespace' => 'Api'], function() {

    Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function() {

        require(app_path('Http/Routes/Api/v1/students.php'));
        require(app_path('Http/Routes/Api/v1/boards.php'));

    });

});
