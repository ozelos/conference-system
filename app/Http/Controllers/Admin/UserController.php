<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Rodo visų naudotojų sąrašą administratoriui
     */
    public function index(): View
    {
        $users = User::all();  // arba ::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Rodo naudotojo redagavimo formą
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Atnaujina naudotojo duomenis
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:client,employee,admin',
            // jei nori leisti keisti email ar slaptažodį – pridėk taisykles
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Naudotojas atnaujintas');
    }
}
