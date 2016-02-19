<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Show all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "all students";
    }

    /**
     * Show a specified resource.
     *
     * @param  \App\User $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        return "show student with id $student";
    }
}
