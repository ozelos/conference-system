<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Pagrindinis puslapis (visiems matomas)
Route::get('/', function () {
    return view('welcome'); // arba 'home' su studento info
})->name('home');

// Kliento posistemis
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{conference}', [ClientController::class, 'show'])->name('conferences.show');
    Route::post('/conferences/{conference}/register', [ClientController::class, 'register'])->name('conferences.register');
});

// Darbuotojo posistemis
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/{conference}', [EmployeeController::class, 'show'])->name('conferences.show');
    // darbuotojas negali redaguoti/kurti/trinti → tik peržiūra ir sąrašas
});

// Administratoriaus posistemis (dažniausiai su middleware vėliau)
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Konferencijų valdymas
    Route::resource('conferences', ConferenceController::class)->except(['show']);
    // jei nori pridėti custom metodą, pvz. peržiūrai admin'e:
    Route::get('conferences/{conference}/preview', [ConferenceController::class, 'preview'])->name('conferences.preview');

    // Naudotojų valdymas (tik redagavimas)
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    // trynimo ir kūrimo pagal užduotį nereikia
});

// Logout mygtukas disabled (kol nėra autentifikacijos)
Route::get('/logout', function () {
    return redirect()->route('home')->with('info', 'Autentifikacija dar neįdiegta');
})->name('logout');
