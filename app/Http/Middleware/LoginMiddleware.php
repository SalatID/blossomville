<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
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
        // dd($request->url());
        if (request()->session()->has('userData')) {
            if(session()->has('p_page')) {
                $pPage = session()->get('p_page');
                session()->forget('p_page');
                return redirect($pPage);
            };
            return $next($request);
        }
        session()->put('p_page',$request->url());
        return redirect('/');
    }
}
