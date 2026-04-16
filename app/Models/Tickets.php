<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'board_area_id',
        'user_id',
        'assigned_to',
        'verified_by',
        'priority_level',
        'type',
        'ticket_order',
        'background_color',
        'rank',
        'sprint_id'
    ];

    public function boardArea()
    {
        return $this->belongsTo(BoardArea::class, 'board_area_id');
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'sprint_id');
    }
}
