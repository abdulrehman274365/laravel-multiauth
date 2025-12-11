<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WorkspacesMiddleware
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
        $workspace=session()->get('workspace');
        if(!session()->has('workspace')){
            return redirect()->route('workspaces.index');
        }
        return $next($request);
    }
}
