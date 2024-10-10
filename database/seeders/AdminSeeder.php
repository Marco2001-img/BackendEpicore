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
            'nombre' => 'Administrador de prueba 1',
            'telefono' => '1111457890',
            'email' => 'admin@epicore.com',
            'password' => Hash::make('EPICORE1'),
            'estatus'=> 1,
        ]);

        DB::table('admins')->insert([
            'nombre' => 'Administrador de prueba 2',
            'telefono' => '2221457890',
            'email' => 'admin1@epicore.com',
            'password' => Hash::make('EPICORE2'),
            'estatus'=> 1,
        ]);

        DB::table('admins')->insert([
            'nombre' => 'Administrador de prueba 3',
            'telefono' => '3331457890',
            'email' => 'admin2@epicore.com',
            'password' => Hash::make('EPICORE3'),
            'estatus'=> 1,
        ]);
    }
}
