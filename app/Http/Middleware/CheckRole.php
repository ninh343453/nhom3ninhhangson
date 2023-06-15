<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // If the user is not authenticated, redirect them to the login page
            return redirect('/index');
        }

        $user = Auth::user();

        if ($user->role != $role) {
            // If the user does not have the necessary role, redirect them to the login page
            return redirect('/index');
        }

        return $next($request);
    }
}
