<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'manager_id',
        'address',
        'phone',
        'avatar',
        'type'
    ];

    /**
     * Get the manager that owns the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id', 'id')->withDefault();
    }

    public function packages() {
        return $this->hasMany(Package::class, 'gym_id');
    }


    public function getAvaterAttribute()
    {
        if ($this->avatar) {

            return asset('uploads/' . $this->avatar);
        }

        return 'https://ui-avatars.com/api/?name=' . $this->name;
    }
}
