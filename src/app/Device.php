<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * Get the Room for this Device.
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
