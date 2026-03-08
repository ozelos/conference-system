<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        if ($conference->is_past) {
            return redirect()->back()->with('error', __('messages.cannot_delete_past'));
        }
        $conference->delete();
        return redirect()->route('admin.conferences.index')->with('success', __('messages.deleted'));
    }

    // Admin\ConferenceController.php

    public function store(StoreConferenceRequest $request)
    {
        $validated = $request->validated(); // tik validuoti duomenys

        Conference::create($validated);

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija sukurta sėkmingai.');
    }

    public function update(UpdateConferenceRequest $request, Conference $conference)
    {
        $conference->update($request->validated());

        return redirect()->route('admin.conferences.index')
            ->with('success', 'Konferencija atnaujinta.');
    }
}
