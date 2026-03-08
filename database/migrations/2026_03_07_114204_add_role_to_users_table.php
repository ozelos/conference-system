<?php

// add_role_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client'); // 'client', 'employee', 'admin'
            // Jei nori – galima pridėti vardą/pavardę atskirai, bet default turi name
            // $table->string('first_name')->nullable();
            // $table->string('last_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            // $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
