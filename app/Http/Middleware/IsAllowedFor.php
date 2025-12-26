<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IsAllowedFor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $workspace = session()->get('workspace');
        $user = Auth::user();
        if ($user->status == 'active') {
            if (!$user || !in_array(auth()->user()->role($workspace->id), $roles)) {
                return redirect()->route('dashboard')->with([
                    'toast' => [
                        'type' => 'error',
                        'title' => 'Access Denied',
                        'message' => 'You do not have permission to access this page.',
                    ]
                ]);

            }
        } else {
            return redirect()->route('dashboard')->with([
                'toast' => [
                    'type' => 'warning',
                    'title' => 'Account Inactive',
                    'message' => 'Your account is inactive.',
                ]
            ]);
        }
        return $next($request);
    }
}
