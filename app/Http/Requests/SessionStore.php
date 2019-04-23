<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;

class SessionStore extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('session:create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'time' => 'required',
            'session_type_id' => 'required',
        ];
    }
}
