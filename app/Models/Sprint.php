<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'sprint_days',
        'start_date',
        'end_date',
        'user_id',
        'is_started',
        'action_by',
        'status',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'sprint_id');
    }

}
