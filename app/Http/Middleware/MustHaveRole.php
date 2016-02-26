<?php

namespace App\Http\Middleware;

use Closure;

class MustHaveRole
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
        $arguments = collect(func_get_args())->except([0, 1])
                                             ->flatten()
                                             ->all();
        return $next($request);
    }
}
