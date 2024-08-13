<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hierarchy extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug'];

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }
}
