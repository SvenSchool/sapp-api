<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Requests;
use App\Utilities\ApiResponse;
use App\Transformers\Api\StudentTransformer;

class StudentsController extends ApiController
{
    /**
     * @var \App\Transformers\Api\StudentTransformer
     */
    protected $transformer;

    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * Instantiate the StudentsController.
     *
     * @param \App\Transformers\Api\StudentTransformer $transformer
     * @param \App\Utilities\ApiResponse               $response
     */
    public function __construct(StudentTransformer $transformer, ApiResponse $response)
    {
        $this->transformer = $transformer;
        $this->response = $response;

        $this->middleware('jwt.auth');
        $this->middleware('role:teacher,admin', ['except' => ['index', 'show', 'update']]);
    }

    /**
     * Show all students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::students()->paginate( $this->getPerPage() );

        return $this->response->make()->withPagination([
            'data' => $this->transformer->transformCollection($students->all()),
        ], $students);
    }

    /**
     * Show a specified resource.
     *
     * @param  \App\User $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $student)
    {
        return $this->response->make([
            'data' => $this->transformer->transform($student),
        ]);
    }
}
