<?php

namespace App\Http\Controllers\Api\V1;

use App\Group;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Utilities\ApiResponse;
use App\Transformers\Api\GroupTransformer;

class GroupsController extends ApiController
{
    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * @var GroupTransformer
     */
    protected $transformer;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Instantiate the GroupsController.
     *
     * @param \App\Utilities\ApiResponse $response
     */
    public function __construct(GroupTransformer $transformer, ApiResponse $response, Request $request)
    {
        $this->response = $response;
        $this->transformer = $transformer;
        $this->request = $request;

        $this->middleware('jwt.auth');
    }

    /**
     * Show all groups.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::active()->paginate( $this->getPerPage() );

        return $this->response->make()->withPagination([
            'data' => $this->transformer->transformCollection($groups->all()),
        ], $groups);
    }

    /**
     * Show one group.
     *
     * @param  integer $group
     * @return \App\Utilities\ApiResponse
     */
    public function show(Group $group)
    {
        return $this->response->make([
            'data' => $this->transformer->transform($group),
        ]);
    }
}
