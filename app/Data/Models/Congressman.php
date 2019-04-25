<?php

namespace App\Data\Models;

class Congressman extends Model
{
    // This is a readonly model
    // Please check DOCIGP project

    protected $with = ['party', 'user'];

    protected $filterableColumns = ['name'];

    protected $orderBy = ['name' => 'asc'];

    public function legislatures()
    {
        return $this->hasMany(CongressmanLegislature::class);
    }

    public function scopeActive($query)
    {
        return $query
            ->join(
                'congressman_legislatures',
                'congressman_legislatures.congressman_id',
                '=',
                'congressmen.id'
            )
            ->whereNull('congressman_legislatures.ended_at');
    }

    public function scopeNonActive($query)
    {
        return $query
            ->join(
                'congressman_legislatures',
                'congressman_legislatures.congressman_id',
                '=',
                'congressmen.id'
            )
            ->whereNotNull('congressman_legislatures.ended_at');
    }
    /**
     * @return \App\Data\Models\Legislature|null
     */
    public function getCurrentLegislatureAttribute()
    {
        return $this->legislatures()
            ->whereNull('ended_at')
            ->first();
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}
