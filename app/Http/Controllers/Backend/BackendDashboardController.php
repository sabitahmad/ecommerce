<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BackendDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
