<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSession extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id', 'id')->withDefault();
    }
}
