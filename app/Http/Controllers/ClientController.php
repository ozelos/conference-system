<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Rodo visas konferencijas klientui
     */
    public function index()
    {
        $conferences = Conference::all(); // arba ::where('date', '>', now())->get() jei nori ateities

        return view('client.conferences.index', compact('conferences'));
    }

    /**
     * Rodo vieną konferenciją
     */
    public function show(Conference $conference)
    {
        return view('client.conferences.show', compact('conference'));
    }

    /**
     * Kliento registracija į konferenciją
     */
    public function register(RegisterConferenceRequest $request, $conferenceId)
    {
        $conference = Conference::findOrFail($conferenceId);

        // Kol nėra autentifikacijos – simuliuojame registraciją
        // Realybėje: Auth::user()->conferences()->attach($conference->id);

        // Pavyzdžiui – įrašome į registrations lentelę be user_id (testavimui)
        \App\Models\Registration::create([
            'conference_id' => $conference->id,
            // 'user_id' => Auth::id(),   // vėliau įjungsi
            'registered_at' => now(),
        ]);

        return redirect()
            ->route('client.conferences.index')
            ->with('success', 'Sėkmingai užsiregistravote į konferenciją „' . $conference->title . '“!');
    }
}
