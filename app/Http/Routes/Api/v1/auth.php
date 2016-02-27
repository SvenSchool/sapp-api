<?php

Route::group(['prefix' => 'auth'], function() {

    Route::post('auth', [
        'uses' => 'AuthController@authenticate',
    ]);

});