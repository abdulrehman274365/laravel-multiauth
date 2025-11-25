<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('user.v1.dashboard');
    }

    public function LockScreen()
    {
        session()->put('isLocked', true);
        return view('user.v1.lock');
    }

    public function unLockScreen(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'password' => 'required'
        ]);

        if (Hash::check($request->password, $user->password)) {
            session()->forget('isLocked');
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'password' => 'Incorrect password.'
        ]);
    }
}
