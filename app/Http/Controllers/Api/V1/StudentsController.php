<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
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
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $response;

    /**
     * Instantiate the StudentsController.
     *
     * @param StudentTransformer $studentTransformer
     * @param ResponseFactory $response
     */
    public function __construct(StudentTransformer $studentTransformer, ResponseFactory $response)
    {
        $this->studentTransformer = $studentTransformer;
        $this->response = $response;

        $this->middleware('role:teacher,admin', ['except' => ['index', 'show', 'update']]);
        $this->middleware('jwt.auth');
    }

    /**
     * Show all resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::students()->paginate(50);

        return $this->respond([
            'data' => $this->studentTransformer->transformCollection($students->all())
        ]);
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

        if (! $student) return $this->respond()->notFound();

        return $this->respond([
            'data' => $this->studentTransformer->transform($student)
        ]);
    }

    public function store(\App\Http\Requests\CreateStudent $request)
    {
        User::create($request->all());
    }
}
