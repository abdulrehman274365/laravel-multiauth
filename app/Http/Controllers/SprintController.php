<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index(Request $request)
    {
        return view('workspaces.v1.Sprint.v1.index');
    }

    public function create(Request $request)
    {
        return view('workspaces.v1.Sprint.v1.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
