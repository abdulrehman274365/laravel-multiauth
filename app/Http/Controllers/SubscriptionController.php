<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;

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
        ]);
        return redirect()->route('workspaces.index');
    }
}
