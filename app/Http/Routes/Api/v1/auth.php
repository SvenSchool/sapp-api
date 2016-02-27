<?php

Route::group(['prefix' => 'auth'], function() {

    Route::post('/', [
        'uses' => 'AuthController@authenticate',
    ]);

});