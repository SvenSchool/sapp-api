<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BoardsController extends Controller
{
    /**
     * Show all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "all boards";
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Board $board
     * @return \Illuminate\Http\Response
     */
    public function show($board)
    {
        return "show board with id $board";
    }
}
