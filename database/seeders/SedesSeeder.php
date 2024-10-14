<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sedes')->insert([
            'id_admin' => '1',
            'nombre' => 'Sede Norte',
            'dato_sede' => json_encode([
                'calle_no' => 'Av. 5 de Febrero 1000',
                'colonia' => 'Centro',
                'entre_calles' => 'Calle 1 y Calle 2',
                'ciudad' => 'Hermosillo',
                'estado' => 'Sonora',
                'pais' => 'México',
                'cp' => '76000',
            ]),
            'contacto_sede' => json_encode([
                'nombre_contacto' => 'Juan Perez',
                'telefono_oficina' => '4441457890',
                'telefono_movil' => '4421234567',
                'email' => 'sede1@epicore.com',
                'observaciones' => 'Atención de 9 a 5.',
            ]),
            'estatus' => 1,
        ]);

        DB::table('sedes')->insert([
            'id_admin' => '2',
            'nombre' => 'Sede Centro',
            'dato_sede' => json_encode([
                'calle_no' => 'Paseo de la Reforma 123',
                'colonia' => 'Juárez',
                'entre_calles' => 'Calle 3 y Calle 4',
                'ciudad' => 'Ciudad de México',
                'estado' => 'CDMX',
                'pais' => 'México',
                'cp' => '06600',
            ]),
            'contacto_sede' => json_encode([
                'nombre_contacto' => 'Maria Lopez',
                'telefono_oficina' => '7651234567',
                'telefono_movil' => '5512345678',
                'email' => 'sede2@epicore.com',
                'observaciones' => 'Atención de 8 a 6.',
            ]),
            'estatus' => 1,
        ]);

        DB::table('sedes')->insert([
            'id_admin' => '3',
            'nombre' => 'Sede Sur',
            'dato_sede' => json_encode([
                'calle_no' => 'Calle Falsa 123',
                'colonia' => 'Lindavista',
                'entre_calles' => 'Calle A y Calle B',
                'ciudad' => 'Tuxtla Gutierrez',
                'estado' => 'Chiapas',
                'pais' => 'México',
                'cp' => '44100',
            ]),
            'contacto_sede' => json_encode([
                'nombre_contacto' => 'Pedro González',
                'telefono_oficina' => '3456789012',
                'telefono_movil' => '3312345678',
                'email' => 'sede3@epicore.com',
                'observaciones' => 'Horario de atención flexible.',
            ]),
            'estatus' => 1,
        ]);
    }
}
