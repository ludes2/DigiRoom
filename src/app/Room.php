<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Get the Device for this Room.
     */
    public function device()
    {
        return $this->hasOne('App\Device');
    }

    /**
     * Get the Events for this Room.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
