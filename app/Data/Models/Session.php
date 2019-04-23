<?php

namespace App\Data\Models;

use App\Data\Traits\ModelActionable;

class Session extends Model
{
    use ModelActionable;

    protected $fillable = [
        'date',
        'time',
        'session_type_id',
        'published_at',
        'published_by_id',
    ];

    protected $with = ['sessionType'];

    protected $orderBy = ['date' => 'desc', 'time' => 'desc'];

    public function sessionType()
    {
        return $this->belongsTo(SessionType::class);
    }
}
