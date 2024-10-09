<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            'name' => 'Cliente de prueba 1',
            'email' => 'cliente@epicore.com',
            'password' => Hash::make('EPICORE21'),
        ]);

        DB::table('clientes')->insert([
            'name' => 'Cliente de prueba 2',
            'email' => 'cliente2@epicore.com',
            'password' => Hash::make('EPICORE22'),
        ]);
    }
}
