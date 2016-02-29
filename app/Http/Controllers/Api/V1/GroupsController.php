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
     * @var \App\Transformers\Api\GroupTransformer
     */
    protected $transformer;

    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Instantiate the GroupsController.
     *
     * @param \App\Transformers\Api\GroupTransformer $transformer
     * @param \App\Utilities\ApiResponse             $response
     * @param \Illuminate\Http\Request               $request
     */
    public function __construct(GroupTransformer $transformer, ApiResponse $response, Request $request)
    {
        $this->transformer = $transformer;
        $this->response = $response;
        $this->request = $request;

        $this->middleware('jwt.auth');
    }

    /**
     * Show all groups.
     *
     * @return \App\Utilities\ApiResponse
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
     * @param  \App\Group $group
     * @return \App\Utilities\ApiResponse
     */
    public function show(Group $group)
    {
        return $this->response->make([
            'data' => $this->transformer->transform($group),
        ]);
    }
}
