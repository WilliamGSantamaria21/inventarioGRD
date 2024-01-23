<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario administrador manualmente
        User::create([
            'name' => 'joselo',
            'email' => 'joselo4@gmail.com',
            'password' => bcrypt('contraseña_segura'),
            'identification_number' => 4444541, // Proporciona un valor para identification_number
            'phone_number' => '323555',
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->assignRole('admin');

        // Crear 99 usuarios usando el factory
        User::factory(99)->create();
    }
}
