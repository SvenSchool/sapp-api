<?php

namespace App\Http\Controllers\Api\V1;

use JWTAuth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Utilities\ApiResponse;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Contracts\Routing\ResponseFactory;

class AuthController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Routing\ResponseFactory
     */
    protected $response;

    /**
     * Instantiate the AuthController.
     *
     * @param \Illuminate\Contracts\Routing\ResponseFactory $response
     */
    public function __construct(ApiResponse $response)
    {
        $this->response = $response;
    }

    /**
     * Authenticate the user when given valid credentials.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->response->make()->notAuthorized();
            }
        } catch (JWTException $e) {
            return $this->response->make()->internalError('Could not create authentication token.');
        }

        return $this->response->make([
            'token' => $token,
        ]);
    }
}
