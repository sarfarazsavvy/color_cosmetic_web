<?php

namespace App\Http\Middleware;

use Closure;
use App\User;


class Approved
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

        if (auth()->check()) {
            if (auth()->user()->role != 'admin') {
                auth()->logout();
                return redirect()->route('login')->with('message', trans('Sorry, only admin can be logged in'));
            }
        }
            return $next($request);

    }

}