<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Plans::all();
        return view("plans.v1.index",compact("plans"));
    }
    public function purchasePlan(Request $request){
        $user=auth()->user();
        $user->update([
            'user_type'=>'owner',
        ]);
        return redirect()->route('workspaces.index');
    }
}
