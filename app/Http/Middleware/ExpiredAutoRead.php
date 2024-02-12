<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpiredAutoRead
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
        if (Auth::check()) {
            $notifications = Auth::user()->notifications;
            foreach ($notifications as $key => $value) {
                if (Carbon::create($value->created_at)->addMinute($value->data['exp_time']) < Carbon::now()->toDateTimeString()) {
                    $notification = $request->user()->notifications()->where('id', $value->id)->first();
                    if ($notification) {
                        $notification->markAsRead();
                    }
                }
            }
        }

        return $next($request);
    }
}
