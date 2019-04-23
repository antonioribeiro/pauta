<?php

namespace App\Http\Controllers\Web\Pub;

use App\Http\Controllers\Controller;

class LinkGenerator extends Controller
{
    public function index()
    {
        return view('public.link-generator.index');
    }
}
