<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Galima perduoti duomenis į Blade, pvz.:
        $studentInfo = [
            'name' => 'Nikita [Tavo pavardė]',
            'group' => '[Tavo grupė, PIT-23NL]'
        ];

        return view('home', compact('studentInfo'));
    }
}
