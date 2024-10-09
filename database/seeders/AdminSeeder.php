<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'Administrador de prueba 1',
            'email' => 'admin@epicore.com',
            'password' => Hash::make('EPICORE1'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Administrador de prueba 2',
            'email' => 'admin1@epicore.com',
            'password' => Hash::make('EPICORE2'),
        ]);
    }
}
