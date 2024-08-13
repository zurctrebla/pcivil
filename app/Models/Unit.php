<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ip',
        'complement',
        'number',
        'address',
        'district',
        'city',
        'zip_code',
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}
