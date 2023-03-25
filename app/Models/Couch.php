<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couch extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'gym_id',
        'gender',

    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id', 'id');
    }
}
