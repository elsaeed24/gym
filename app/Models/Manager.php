<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'birth_date',
        'gender',
        'address',
        'phone',
        'avatar',
        'password',
        'national_id',
        'last_active_at',
        'city',
        'banned_at'

    ];

    public function getAvaterAttribute()
    {
        if ($this->avatar) {

            return asset('uploads/' . $this->avatar);
        }

        return 'https://ui-avatars.com/api/?name=' . $this->name;
    }
}
