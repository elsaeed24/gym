<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'session_id',
        'attendance_time',
        'attendance_date',
        'gym_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function seesion()
    {
        return $this->belongsTo(TrainingSession::class, 'session_id', 'id')->withDefault();
    }
    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id', 'id');
    }
}
