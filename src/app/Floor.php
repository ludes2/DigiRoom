<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    /**
     * Get the Building for this Floor.
     */
    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    /**
     * Get the Rooms for this Floor.
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
