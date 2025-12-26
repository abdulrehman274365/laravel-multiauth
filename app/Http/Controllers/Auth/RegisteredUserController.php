<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Services\ActivityLogger;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $source = "";
        if ($request->source) {
            $source = $request->source;
        }
        //dd($source);
        return view('auth.register', compact('source'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Register Successful',
            'function' => 'RegisterUser',
            'user_log' => 'Welcome! ' . auth()->user()->name,
            'owner_log' => auth()->user()->name . ' registered recently.',
            'general_log' => 'User ID ( ' . auth()->user()->id . ' ) registered recently.',
            'log_icon' => 'ri-user-add-line',
            'log_style' => [
                'color' => '#198754',
                'backgroundColor' => '#d1e7dd',
            ],
        ]);

        return redirect(RouteServiceProvider::PLANS);

    }
}
