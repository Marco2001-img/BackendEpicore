<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('departamentos')->insert([
            'id_sede' => '1',
            'nombre' => 'Departmento prueba 1',
            'descripcion' => 'Departamento de prueba numero 1',
            'estatus' => 1
        ]);

        DB::table('departamentos')->insert([
            'id_sede' => '2',
            'nombre' => 'Departmento prueba 2',
            'descripcion' => 'Departamento de prueba numero 2',
            'estatus' => 1
        ]);

        DB::table('departamentos')->insert([
            'id_sede' => '3',
            'nombre' => 'Departamento de prueba 3',
            'descripcion' => 'Departamento de prueba numero 3',
            'estatus' => 1
        ]);
    }
}
