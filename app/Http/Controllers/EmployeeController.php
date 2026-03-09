<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Rodo visų konferencijų sąrašą darbuotojui
     */
    public function index(): View
    {
        $conferences = Conference::all();  // arba ::latest()->get() jei nori rūšiuoti

        return view('employee.conferences.index', compact('conferences'));
    }

    /**
     * Rodo vieną konferenciją + užsiregistravusius
     */
    public function show(Conference $conference): View
    {
        $conference->load('registrations.user');  // užkrauname registracijas ir vartotojus

        return view('employee.conferences.show', compact('conference'));
    }
}
