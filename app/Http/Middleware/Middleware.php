<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\JWTAuth;
use App\Utilities\ApiResponse;
use Illuminate\Contracts\Events\Dispatcher;

class Middleware
{
    /**
     * @var \App\Utilities\ApiResponse
     */
    protected $response;

    /**
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $JWTAuth;

    /**
     * Create a new BaseMiddleware instance.
     *
     * @param \App\Utilities\ApiResponse              $response
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     * @param \Tymon\JWTAuth\JWTAuth                  $JWTAuth
     */
    public function __construct(ApiResponse $response, Dispatcher $events, JWTAuth $JWTAuth)
    {
        $this->response = $response;
        $this->events = $events;
        $this->JWTAuth = $JWTAuth;
    }

    /**
     * Fire event and return the response.
     *
     * @param  mixed
     * @return mixed
     */
    protected function respond(...$arguments)
    {
        return $this->response->make($arguments);
    }
}
