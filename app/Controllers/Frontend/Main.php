<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {
        return view('frontend/main');
    }
}
