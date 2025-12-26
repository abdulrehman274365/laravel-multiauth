<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\DashboardSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Services\ActivityLogger;



class UserController extends Controller
{
    public function index()
    {
        $settings = DashboardSetting::where('user_id', auth()->user()->id)->first();
        if (!$settings) {
            DashboardSetting::create([
                'user_id' => auth()->user()->id,
            ]);
        }
        return view('user.v1.dashboard');

    }

    public function LockScreen()
    {
        session()->put('last_route', url()->previous());
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
            $lastUrl = session()->pull(
                'last_route',
                route('dashboard')
            );
            return redirect()->to($lastUrl);
        }
        return back()->withErrors([
            'password' => 'Incorrect password.'
        ]);
    }

    public function profileView()
    {
        return view('user.v1.profile');
    }

    public function userUpdateProfile(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'id_card' => $request->id_card,
            'address' => $request->address,
        ]);

        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Profile Updated',
            'function' => 'userProfileUpdate',
            'user_log' => 'You, updated your profile.',
            'owner_log' => auth()->user()->name . ' updated profile general information.',
            'general_log' => 'User ID (' . auth()->user()->id . ') updated the general information.',
            'log_icon' => 'ri-user-settings-line',
            'log_style' => [
                'color' => '#0d6efd',
                'backgroundColor' => '#e7f1ff',
            ],
        ]);

        return response()->json([
            'success' => true,
            'toast' => [
                'type' => 'success',
                'title' => 'Profile Updated',
                'message' => 'Your profile information has been updated successfully.'
            ]
        ]);
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
        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Profile Image Uploaded',
            'function' => 'UploadProfileImage',
            'user_log' => 'Profile image updated.',
            'owner_log' => auth()->user()->name . ' updated profile image.',
            'general_log' => 'User ID ( ' . auth()->user()->id . ' ) updated the profile image.',
            'log_icon' => 'ri-camera-line',
            'log_style' => [
                'color' => '#0d6efd',
                'backgroundColor' => '#e7f1ff',
            ],
        ]);
        return back()->with([
            'toast' => [
                'type' => 'success',
                'title' => 'Profile Updated',
                'message' => 'Profile image uploaded successfully!',
            ]
        ]);
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
        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Profile Image Removed',
            'function' => 'defaultProfileImage',
            'user_log' => 'Profile image removed.',
            'owner_log' => auth()->user()->name . ' removed profile image.',
            'general_log' => 'User ID ( ' . auth()->user()->id . ' ) removed the profile image.',
            'log_icon' => 'ri-camera-off-line',
            'log_style' => [
                'color' => '#856404',
                'backgroundColor' => '#fff3cd',
            ],
        ]);
        return back()->with([
            'toast' => [
                'type' => 'info',
                'title' => 'Image Removed',
                'message' => 'Profile image removed!',
            ]
        ]);
    }

    public function userActivityLogs()
    {
        $logs = ActivityLog::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('user.v1.logs', compact('logs'));
    }

    public function getLatestLogs()
    {
        $logs = ActivityLog::orderBy('created_at', 'desc')
            ->where('user_id', auth()->user()->id)
            ->select('log_title', 'user_log', 'log_icon', 'log_style', 'created_at')
            ->take(4)
            ->get();
        if (count($logs) > 0) {
            return response()->json([
                'success' => true,
                'logs' => $logs,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'logs' => $logs,
            ]);
        }
    }
    public function userNightModeSetting(Request $request)
    {
        $user = auth()->user();

        if ($user->dashboardSettings) {
            $nightMode = filter_var($request->night_mode, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;

            $user->dashboardSettings->update([
                'night_mode' => $nightMode
            ]);

            return response()->json([
                'success' => true,
                'night_mode' => $user->dashboardSettings->night_mode
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Dashboard settings not found'
        ], 404);

    }

    public function userLeftSideBarSetting(Request $request)
    {
        $user = auth()->user();

        if ($user->dashboardSettings) {
            $left_side_bar_collpsed = filter_var($request->left_side_bar_collpsed, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;

            $user->dashboardSettings->update([
                'left_side_bar_collpsed' => $left_side_bar_collpsed
            ]);

            return response()->json([
                'success' => true,
                'left_side_bar_collpsed' => $user->dashboardSettings->left_side_bar_collpsed
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Dashboard settings not found'
        ], 404);
    }

    public function userChangePassword(Request $request)
    {
        $old_password = $request->old_password;

        if (!Hash::check($old_password, auth()->user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Old password is incorrect',
            ]);
        }

        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Password Changed',
            'function' => 'userChangePassword',
            'user_log' => 'You, changed your password.',
            'owner_log' => auth()->user()->name . ' change password.',
            'general_log' => 'User ID (' . auth()->user()->id . ') change password.',
            'log_icon' => 'ri-key-2-line',
            'log_style' => [
                'color' => '#fd7e14',
                'backgroundColor' => '#fdedd5ff'
            ],
        ]);

        return response()->json([
            'success' => true,
            'toast' => [
                'type' => 'info',
                'title' => 'Password Changed',
                'message' => 'Your password changed successfully.'
            ]
        ]);

    }

    public function settingsView()
    {
        return view('Settings.v1.index');
    }

}
