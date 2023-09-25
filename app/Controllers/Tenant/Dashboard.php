<?php

namespace App\Controllers\Tenant;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('Tenant/dashboard');
    }
}
