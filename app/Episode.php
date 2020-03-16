<?php

namespace App;

use App\Season;
use App\Actor;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    
    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
