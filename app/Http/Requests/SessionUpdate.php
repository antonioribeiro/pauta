<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;

class SessionUpdate extends SessionStore
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('session:update');
    }
}
