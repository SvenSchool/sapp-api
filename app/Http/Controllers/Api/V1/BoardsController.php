<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests;

class BoardsController extends ApiController
{
    protected $boardTransformer;

    public function __construct(BoardTransformer $boardTransformer)
    {
        $this->boardTransformer = $boardTransformer;
    }

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
