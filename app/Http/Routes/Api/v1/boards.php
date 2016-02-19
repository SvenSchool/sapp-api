<?php

Route::group(['prefix' => 'boards'], function() {

    Route::get('/', [
        'uses' => 'BoardsController@index',
        'as' => 'boards.index',
    ]);

    Route::get('{board}', [
        'uses' => 'BoardsController@show',
        'as' => 'boards.show',
    ]);

});