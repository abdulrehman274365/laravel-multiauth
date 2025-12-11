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

    public function workspaceSelected(Request $request)
    {
        $workspace = Workspace::find($request->workspace_id);
        if ($workspace) {
            session()->put('workspace', $workspace);
            return response()->json([
                "success" => true,
            ]);
        } else {
            return response()->json([
                "success" => false,
            ]);
        }
    }

    public function createWorkspace(Request $request)
    {
        Workspace::create([
            "name" => $request->name,
            "icon" => $request->icon,
            "user_id" => auth()->user()->id,
            "email" => $request->email,
            "website" => $request->website,
            "phone" => $request->phone,
            "address" => $request->country . ", " . $request->city . ", " . $request->address,
            "style" => [
                "color" => $request->color,
                "backgroundColor" => $request->backgroundColor,
            ],
        ]);
        return response()->json([
            "success"=> true,
        ]);
    }
}
