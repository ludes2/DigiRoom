<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'properties' => 'array',
    ];

    /**
     * Get the Room for this Event.
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

        /**
     * Get the User for this Event.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function duration()
    {
        $start = Carbon::create($this->start);
        $end = Carbon::create($this->end);
        return $start->diffInHours($end);
    }
}
