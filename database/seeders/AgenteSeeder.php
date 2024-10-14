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
            'id_departamento' => 1,
            'id_grupo' => 1,
            'icono' => 'imagen1.png',
            'nombre' => 'Agente Primero',
            'email' => 'agente@epicore.com',
            'password' => Hash::make('EPICORE11'),
            'telefono' => '331312345',
            'estado_agente' => 'activo',
            'estatus' => 1
        ]);

        DB::table('agentes')->insert([
            'id_departamento' => 2,
            'id_grupo' => 2,
            'icono' => 'imagen2.png',
            'nombre' => 'Agente Segundo',
            'email' => 'agente1@epicore.com',
            'password' => Hash::make('EPICORE12'),
            'telefono' => '332223344',
            'estado_agente' => 'activo',
            'estatus' => 1
        ]);

        DB::table('agentes')->insert([
            'id_departamento' => 3,
            'id_grupo' => 3,
            'icono' => 'imagen3.png',
            'nombre' => 'Agente Tercero',
            'email' => 'agente2@epicore.com',
            'password' => Hash::make('EPICORE13'),
            'telefono' => '333334455',
            'estado_agente' => 'activo',
            'estatus' => 1
        ]);
    }
}
