<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'workspace_id',
        'area_name',
        'status',
        'area_order',
        'done_stage',
        'background_color',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'board_area_id');
    }
}
