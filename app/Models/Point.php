<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ip',
        'agent_id',
        'lat',
        'lng'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function getCreatedAtBrAttribute(): string
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getCreatedAtHrAttribute(): string
    {
        return $this->created_at->format('H:i:s');
    }
}
