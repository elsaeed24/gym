<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manager() {

        return $this->belongsTo(Manager::class, 'manager_id');

    }
}
