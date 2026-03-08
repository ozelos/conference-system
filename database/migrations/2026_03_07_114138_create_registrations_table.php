<?php

// database/migrations/xxxx_xx_xx_create_registrations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');     // Kas užsiregistravo (klientas)
            $table->foreignId('conference_id')->constrained()->onDelete('cascade'); // Į kokią konferenciją
            $table->timestamp('registered_at')->useCurrent();                     // Kada užsiregistravo
            $table->timestamps();

            // Unikalus derinys – vienas vartotojas gali užsiregistruoti tik vieną kartą į tą pačią konferenciją
            $table->unique(['user_id', 'conference_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
