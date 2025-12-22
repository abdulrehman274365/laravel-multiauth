<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'night_mode',
        'left_side_bar_theme',
        'left_side_bar_collpsed',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
