<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    function index()
    {
        return view("workspaces.v1.index");
    }
}
