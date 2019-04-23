<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class Admin extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
}
