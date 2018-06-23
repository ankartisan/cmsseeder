<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class DashboardController extends ApiController
{

    public function index(Request $request)
    {
        return view('admin/dashboard_admin');
    }


}
