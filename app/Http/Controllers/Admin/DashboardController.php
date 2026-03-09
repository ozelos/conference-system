<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard');  // arba 'admin.home', 'admin.index' – kaip pavadinai Blade failą
    }
}
