<?php

namespace App\Http\Middleware;

use Closure;

class UserHasTime
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
        $message = 'У Вас нет активной подписки!';

        return ($request->user()->hasTime()) ? $next($request) : redirect()->route('index')->with(['flash_message'=> $message]);
    }
}
