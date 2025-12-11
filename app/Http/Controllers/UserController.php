<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;



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

    public function profileView()
    {
        return view('user.v1.profile');
    }

    public function uploadProfileImage(Request $request)
    {
        $user = Auth::user();
        $image = $request->file('profile_image');
        $filename = $user->name . '_' . $user->id . '.' . $image->getClientOriginalExtension();
        $path = public_path('web/uploads/profile_image/');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }
        if ($user->profile_image && $user->profile_image !== 'default.svg') {
            if (File::exists($path . $user->profile_image)) {
                File::delete($path . $user->profile_image);
            }
        }

        $image->move($path, $filename);

        $user->profile_image = $filename;
        $user->save();

        return back()->with('success', 'Profile image uploaded successfully!');
    }

    public function defaultProfileImage()
    {
        $user = Auth::user();
        $path = public_path('web/uploads/profile_image/');

        if ($user->profile_image && $user->profile_image !== 'default.svg') {
            if (File::exists($path . $user->profile_image)) {
                File::delete($path . $user->profile_image);
            }
        }

        $user->profile_image = 'default.svg';
        $user->save();

        return back()->with('success', 'Profile image removed!');
    }

}
