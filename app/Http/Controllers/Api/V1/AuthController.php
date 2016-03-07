<?php

namespace App\Http\Controllers\Api\V1;

use JWTAuth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Utilities\ApiResponse;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Authenticate the user when given valid credentials.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request, ApiResponse $response)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $response->make()->notAuthorized();
            }
        } catch (JWTException $e) {
            return $response->make()->internalError('Could not create authentication token.');
        }

        return $response->make([
            'token' => $token,
        ]);
    }
}
