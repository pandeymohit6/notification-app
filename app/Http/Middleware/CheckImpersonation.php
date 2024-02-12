<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckImpersonation
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('original_user_id')) {
            Auth::onceUsingId($request->session()->get('original_user_id'));
        }
        return $next($request);
    }
}
