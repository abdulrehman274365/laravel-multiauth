<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ActivityLogger;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Logged In',
            'function' => 'AuthStore',
            'user_log' => 'You logged in.',
            'owner_log' => auth()->user()->name . ' logged in.',
            'general_log' => 'User ID ( ' . auth()->user()->id . ' ) logged in.',
            'log_icon' => 'ri-login-box-line',
            'log_style' => [
                'color' => '#0d6efd',
                'backgroundColor' => '#cfe2ff',
            ],

        ]);
        return redirect()->intended(RouteServiceProvider::WORKSPACES);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Log out',
            'function' => 'AuthDestory',
            'user_log' => 'You logged out.',
            'owner_log' => auth()->user()->name . ' logged out.',
            'general_log' => 'User ID ( ' . auth()->user()->id . ' ) logged out.',
            'log_icon' => 'ri-logout-box-line',
            'log_style' => [
                'color' => '#fd7e14',
                'backgroundColor' => '#fff3cd',
            ],
        ]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        session()->forget('workspace');
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
