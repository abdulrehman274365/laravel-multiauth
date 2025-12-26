<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;
use App\Services\ActivityLogger;


class SubscriptionController extends Controller
{
    public function index()
    {
        $user_type = null;
        if (auth()->check()) {
            $user_type = auth()->user()->user_type;
        }
        $plans = Plans::all();
        if ($user_type == "owner" || $user_type == "employee") {
            return redirect()->route('workspaces.index');
        }
        return view("plans.v1.index", compact("plans"));
    }
    public function purchasePlan(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'user_type' => 'owner',
            'status' => 'active',
        ]);

        ActivityLogger::store([
            'model' => 'User',
            'log_title' => 'Purchase Successful',
            'function' => 'purchasePlan',
            'user_log' => 'Congratulations! ' . auth()->user()->name . ', your purchase is successfully complete. You can now create your workspaces to start working.',
            'owner_log' => auth()->user()->name . ' purchased a subscription.',
            'general_log' => 'User ID (' . auth()->user()->id . ') purchased a subscription.',
            'log_icon' => 'ri-shopping-cart-line',
            'log_style' => [
                'color' => '#0d6efd',
                'backgroundColor' => '#cfe2ff',
            ],
        ]);

        return redirect()->route('workspaces.index');
    }
}
