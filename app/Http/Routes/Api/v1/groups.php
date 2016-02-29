<?php

Route::group(['prefix' => 'groups'], function() {

    Route::get('/', [
        'uses' => 'GroupsController@index',
        'as' => 'groups.index',
    ]);

    Route::get('{group}', [
        'uses' => 'GroupsController@show',
        'as' => 'groups.show',
    ]);

});
