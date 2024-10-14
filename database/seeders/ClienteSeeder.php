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
            'nombre_completo' => 'Andre Uriel Solorzano Toledo',
            'nombre_corto' => 'Andre',
            'telefono' => 5622362374,
            'email' => 'cliente@epicore.com',
            'password' => Hash::make('EPICORE21'),
            'observaciones' => 'esto es la primera prueba',
            'estatus'=> 1
        ]);

        DB::table('clientes')->insert([
            'nombre_completo' => 'Eduardo Cruz Toledo',
            'nombre_corto' => 'Lalo',
            'telefono' => 5621017682,
            'email' => 'cliente1@epicore.com',
            'password' => Hash::make('EPICORE22'),
            'observaciones' => 'esto es una segunda prueba',
            'estatus'=> 1
        ]);

        DB::table('clientes')->insert([
            'nombre_completo' => 'Paulino Arrazate Garcia',
            'nombre_corto' => 'Paulino',
            'telefono' => 5623451290,
            'email' => 'cliente2@epicore.com',
            'password' => Hash::make('EPICORE23'),
            'observaciones' => 'esto es una tercera prueba',
            'estatus'=> 1
        ]);
    }
}
