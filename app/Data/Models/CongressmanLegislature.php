<?php

namespace App\Data\Models;

class CongressmanLegislature extends Model
{
    // This is a readonly model
    // Please check DOCIGP project

    protected $dates = ['started_at', 'ended_at'];

    public function legislature()
    {
        return $this->belongsTo(Legislature::class);
    }

    public function congressman()
    {
        return $this->belongsTo(Congressman::class);
    }
}
