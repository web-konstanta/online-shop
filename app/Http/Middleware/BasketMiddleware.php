<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasketMiddleware
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
        if (!(session()->has('user'))) {
            return redirect('user/login/')->with('error', 'Для добавления товара необходимо войти на сайт');
        }
        return $next($request);
    }
}
