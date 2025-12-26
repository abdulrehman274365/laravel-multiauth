<?php

namespace App\Http\Controllers;
use App\Models\Workspace;
use App\Models\UsersRoles;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    function index()
    {
        return view("workspaces.v1.index");
    }

    public function getWorkspace()
    {
        $user = auth()->user();

        $workspaces = $user->workspaces()->get();

        if ($workspaces->count() > 0) {
            return response()->json([
                "success" => true,
                "data" => $workspaces
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "No workspaces found"
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
        $workspace = Workspace::create([
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
        UsersRoles::create([
            "workspace_id" => $workspace->id,
            "user_id" => auth()->user()->id,
            "role_updated_by" => auth()->user()->id,
            "role" => 'owner',
        ]);

        $user = auth()->user();
        $user->update([
            'employe_number' => 'EMP-' . auth()->user()->id,
        ]);

        ActivityLogger::store([
            'model' => 'Workspace',
            'log_title' => 'Workspace Created',
            'function' => 'createWorkspace',
            'user_log' => 'You created a new workspace: ' . $workspace->name,
            'owner_log' => auth()->user()->name . ' created a new workspace ID (' . $workspace->id . ').',
            'general_log' => 'User ID (' . auth()->user()->id . ') created a new workspace ID (' . $workspace->id . ').',
            'log_icon' => 'ri-building-2-line',
            'log_style' => [
                'color' => '#0dcaf0',
                'backgroundColor' => '#cff4fc',
            ],
        ]);

        return response()->json([
            "success" => true,
        ]);
    }
}
