<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    public function index()
    {
        return "all students";
    }

    public function show($student)
    {
        return "show student with id $student";
    }
}
