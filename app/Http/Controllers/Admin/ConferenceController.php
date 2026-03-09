<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConferenceController extends Controller
{
    /**
     * Rodo visų konferencijų sąrašą administratoriui
     */
    public function index(): View
    {
        $conferences = Conference::all(); // arba ::orderBy('date', 'desc')->get();

        return view('admin.conferences.index', compact('conferences'));
    }

    /**
     * Rodo formą naujai konferencijai sukurti
     */
    public function create(): View
    {
        return view('admin.conferences.create');
    }

    /**
     * Išsaugo naują konferenciją
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'lecturers'   => ['required', 'string'],
            'date'        => ['required', 'date'],
            'time'        => ['required', 'date_format:H:i'],
            'location'    => ['required', 'string', 'max:255'],
        ]);

        Conference::create($validated);

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija sukurta sėkmingai');
    }

    /**
     * Rodo redagavimo formą
     */
    public function edit(Conference $conference): View
    {
        return view('admin.conferences.edit', compact('conference'));
    }

    /**
     * Atnaujina konferenciją
     */
    public function update(Request $request, Conference $conference)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'lecturers'   => ['required', 'string'],
            'date'        => ['required', 'date'],
            'time'        => ['required', 'date_format:H:i'],
            'location'    => ['required', 'string', 'max:255'],
        ]);

        $conference->update($validated);

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija atnaujinta');
    }

    /**
     * Šalina konferenciją (su apsauga nuo įvykusių)
     */
    public function destroy(Conference $conference)
    {
        if ($conference->is_past) {
            return redirect()->back()->with('error', 'Negalima šalinti įvykusios konferencijos');
        }

        $conference->delete();

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija ištrinta');
    }

    // Jei naudoji preview route – pridėk šį metodą
    public function preview(Conference $conference): View
    {
        return view('admin.conferences.preview', compact('conference'));
    }
}
