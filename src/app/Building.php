<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $casts = [
        'address' => 'array',
    ];

    /**
     * Get the Floor for this Building.
     */
    public function floors()
    {
        return $this->hasMany('App\Floor');
    }
}
