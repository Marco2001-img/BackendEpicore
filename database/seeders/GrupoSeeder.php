<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupos')->insert([
            'nombre' => 'Grupo prueba 1',
            'descripcion' => 'Grupo de prueba numero 1',
            'estatus' => 1
        ]);

        DB::table('grupos')->insert([
            'nombre' => 'Grupo prueba 2',
            'descripcion' => 'Grupo de prueba numero 2',
            'estatus' => 1
        ]);

        DB::table('grupos')->insert([
            'nombre' => 'Grupo prueba 3',
            'descripcion' => 'Grupo de prueba numero 3',
            'estatus' => 1
        ]);
    }
}
