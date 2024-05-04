<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        session_start();
        if (!isset($_SESSION))
            return redirect("/");
        if(isset($_SESSION["access_token"]))
            return $next($request);
        else
            return redirect("/");
    }
}
