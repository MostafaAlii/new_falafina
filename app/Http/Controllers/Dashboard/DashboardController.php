<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.admin.dashboard', ['PageTitle' => trans('dashboard/header.main_dashboard')]);
    }
}
