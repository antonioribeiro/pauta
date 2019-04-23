<?php

namespace App\Data\Models;

use OwenIt\Auditing\Auditable;
use App\Data\Traits\Eventable;
use App\Data\Traits\Filterable;
use App\Data\Traits\Selectable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agenda extends Model
{
    use Notifiable, Auditable, Selectable, Filterable, Eventable;

    protected $table = 'agenda';
}
