<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // REGISTRACIJA
    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $clientRole = Role::where('name', 'client')->first();
        if ($clientRole) {
            $user->roles()->attach($clientRole);
        }

        Auth::login($user);

        return redirect()->route('home')
            ->with('success', 'Registracija sėkminga! Jūs esate prisijungęs kaip klientas.');
    }

    // PRISIJUNGIMAS
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('success', 'Sėkmingai prisijungėte!');
        }

        return back()->withErrors([
            'email' => 'Neteisingas el. paštas arba slaptažodis.',
        ])->onlyInput('email');
    }

    // ATSIJUNGIMAS
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Jūs sėkmingai atsijungėte.');
    }
}