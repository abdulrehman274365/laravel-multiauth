<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'workspace_id',
        'model',
        'function',
        'user_log',
        'owner_log',
        'general_log',
        'redirect_to',
        'log_status',
        'log_icon',
        'log_style'
    ];

    protected $casts = [
        'log_style' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

