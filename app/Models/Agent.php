<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Agent extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'hierarchy_id', 'register', 'password'];

    public function hierarchy()
    {
        return $this->belongsTo(Hierarchy::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }
}
