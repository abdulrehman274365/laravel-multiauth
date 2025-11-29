<?php

namespace App\Http\Controllers;
use App\Models\Workspace;

use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    function index()
    {
        return view("workspaces.v1.index");
    }

    public function getWorkspace()
    {
        $workspaces = Workspace::where("user_id", auth()->user()->id)->get();
        if (count($workspaces) > 0) {
            return response()->json([
                "success" => true,
                "data" => $workspaces
            ]);
        } else {
            return response()->json([
                "success" => false,
            ]);
        }
    }
}
