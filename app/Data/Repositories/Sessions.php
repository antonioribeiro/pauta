<?php

namespace App\Data\Repositories;

use App\Data\Models\Session;
use Illuminate\Support\Carbon;
use App\Data\Traits\RepositoryActionable;

class Sessions extends Repository
{
    use RepositoryActionable;

    /**
     * @var string
     */
    protected $model = Session::class;

    public function transform($data)
    {
        $this->addTransformationPlugin(function ($session) {
            $session['date_formatted'] = Carbon::parse(
                $session['date']
            )->format('d/m/Y');

            $session['time_formatted'] = Carbon::parse(
                $session['time']
            )->format('H:i');

            return $session;
        });

        return parent::transform($data);
    }
}
