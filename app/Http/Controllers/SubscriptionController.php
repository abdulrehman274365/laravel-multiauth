<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view("plans.v1.index");
    }
}
