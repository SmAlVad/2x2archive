<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    //Dashboard
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
