<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Utilities\ApiResponse;
use Illuminate\Support\Facades\Response;
use App\Transformers\Api\StudentTransformer;
use Illuminate\Contracts\Routing\ResponseFactory;

class StudentsController extends ApiController
{
    /**
     * @var \App\Transformers\Api\StudentTransformer
     */
    protected $studentTransformer;

    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Instantiate the StudentsController.
     *
     * @param StudentTransformer $studentTransformer
     * @param \App\Utilities\ApiResponse $response
     */
    public function __construct(StudentTransformer $studentTransformer, ApiResponse $response, Request $request)
    {
        $this->studentTransformer = $studentTransformer;
        $this->response = $response;
        $this->request = $request;

        $this->middleware('role:teacher,admin', ['except' => ['index', 'show', 'update']]);
        $this->middleware('jwt.auth');
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
            'data' => $this->studentTransformer->transformCollection($students->all()),
        ], $students);
    }

    /**
     * Show a specified resource.
     *
     * @param  integer $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $student = User::students()->where('id', $student)->first();

        if (! $student) return $this->response->make()->notFound();

        return $this->response->make([
            'data' => $this->studentTransformer->transform($student),
        ]);
    }

    public function store()
    {
        //
    }
}
