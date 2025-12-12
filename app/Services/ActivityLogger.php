<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function store(array $data)
    {
        $workspace = session()->get('workspace');
        return ActivityLog::create([
            'user_id' => Auth::id(),
            'model' => $data['model'],
            'function' => $data['function'],
            'workspace_id' => $workspace->id ?? null,
            'user_log' => $data['user_log'],
            'owner_log' => $data['owner_log'],
            'general_log' => $data['general_log'],
            'redirect_to' => $data['redirect_to'] ?? null,
            'log_status' => 1,
            'log_icon' => $data['log_icon'] ?? 'ri-information-line',
            'log_style' => $data['log_style'],
        ]);
    }
}
