<?php

namespace App\Controllers;

use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function user_dashboard()
    {
        return view('dashboard/user_dashboard');
    }
}
