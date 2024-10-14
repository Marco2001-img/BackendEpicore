<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Tipo_ticketSeeder::class,
            ClienteSeeder::class,
            AdminSeeder::class,
            SedesSeeder::class,
            DepartamentoSeeder::class,
            GrupoSeeder::class,
            AgenteSeeder::class,
            TicketSeeder::class,
        ]);
    }
}
