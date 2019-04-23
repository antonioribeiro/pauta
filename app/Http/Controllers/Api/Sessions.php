<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SessionStore;
use App\Http\Requests\SessionUpdate;
use App\Http\Controllers\Controller;
use App\Data\Repositories\Sessions as SessionsRepository;

class Sessions extends Controller
{
    /**
     * Get all data
     *
     * @return array
     */
    public function all()
    {
        return app(SessionsRepository::class)->all();
    }

    /**
     * Store
     *
     * @param SessionStore $request
     * @return mixed
     */
    public function store(SessionStore $request)
    {
        return app(SessionsRepository::class)->storeFromArray($request->all());
    }

    /**
     * @param SessionUpdate $request
     * @param $id
     * @return mixed
     */
    public function update(SessionUpdate $request, $id)
    {
        return app(SessionsRepository::class)->update($id, $request->all());
    }

    public function publish($id)
    {
        app(SessionsRepository::class)->publish($id);
    }

    public function unpublish($id)
    {
        app(SessionsRepository::class)->unpublish($id);
    }
}
