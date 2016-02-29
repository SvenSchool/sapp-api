<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class GetUserFromJWTToken extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $this->JWTAuth->setRequest($request)->getToken();

        if (! $token) return $this->respond()->notAuthorized('Authentication token not provided.');

        try {
            $user = $this->JWTAuth->authenticate($token);
        } catch (TokenExpiredException $e) {
            return $this->respond()->notAuthorized('Authentication token expired.');
        } catch (JWTException $e) {
            return $this->respond()->notAuthorized('The provided authentication token is invalid.');
        }

        if (! $user) return $this->respond()->notFound('The user for the given token does not exist.');

        return $next($request);
    }
}
