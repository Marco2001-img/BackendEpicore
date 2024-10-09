<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agentes')->insert([
            'name' => 'Agente de prueba 1',
            'email' => 'agente@epicore.com',
            'password' => Hash::make('EPICORE11'),
        ]);

        DB::table('agentes')->insert([
            'name' => 'Agente de prueba 2',
            'email' => 'agente2@epicore.com',
            'password' => Hash::make('EPICORE12'),
        ]);
    }
}
