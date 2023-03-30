<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;


    protected $fillable =[
        'name',
        'price',
        'sessions_number',
        'gym_id'

    ];

    public function gym() {

        return $this->belongsTo(Gym::class, 'gym_id');

    }
}
