<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Sirve para deshabilitar restricción en llaves foráneas
        // Schema::disableForeignKeyConstraints();

        // Verificar si la tabla 'users' ya existe
        if (Schema::hasTable('users')) {
            // Eliminar la tabla 'users' si ya existe
            Schema::dropIfExists('users');
        }
        // Schema::enableForeignKeyConstraints();

        // Crear la tabla 'users' con los nuevos campos
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->bigInteger('identification_number');
            $table->string('phone_number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir la migración eliminando la tabla 'users'
        Schema::dropIfExists('users');
    }
};

