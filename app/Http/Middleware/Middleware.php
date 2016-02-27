<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\JWTAuth;
use App\Utilities\ApiResponse;

class Middleware
{
    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $JWTAuth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @param \App\Utilities\ApiResponse $response
     * @param \Tymon\JWTAuth\JWTAuth $JWTAuth
     */
    public function __construct(ApiResponse $response, JWTAuth $JWTAuth)
    {
        $this->response = $response;
        $this->JWTAuth = $JWTAuth;
    }

    /**
     * Fire event and return the response.
     *
     * @param  mixed
     * @return mixed
     */
    protected function respond($data = null, $headers = [])
    {
        return $this->response->make($data, $headers);
    }
}
