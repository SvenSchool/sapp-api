<?php

Route::group(['prefix' => 'students'], function() {

    Route::get('/', [
        'uses' => 'StudentsController@index',
        'as' => 'students.index',
    ]);

    Route::get('{student}', [
        'uses' => 'StudentsController@show',
        'as' => 'students.show',
    ]);

    Route::post('/', [
        'uses' => 'StudentsController@store',
        'as' => 'students.store',
    ]);

});