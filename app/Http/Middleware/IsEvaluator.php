<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEvaluator
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
        if (!auth()->check() || auth()->user()->peran !== 'Evaluator') {
            abort(403); 
        }
        return $next($request);
    }
}
