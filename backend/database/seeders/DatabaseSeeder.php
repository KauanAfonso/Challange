<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\VersiculoSeeder;
use App\Models\Exercicio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            VersiculoSeeder::class,
        ]);

        

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser', // <-- Adicionado aqui
            'email' => 'test@example.com',
        ]);
    }
}
