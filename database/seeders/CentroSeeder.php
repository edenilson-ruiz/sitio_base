<?php

namespace Database\Seeders;

use App\Models\Centro;
use Illuminate\Database\Seeder;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Centro::create([
        	'nombre' => 'Instituto',
	        'codigo' => 'ISRI'
        ]);

        Centro::create([
        	'nombre' => 'Centro del Aparato Locomotor',
	        'codigo' => 'CAL'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Atención a Ancianos Sara Zalvívar',
	        'codigo' => 'ASILO'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Audicion y Lenguaje',
	        'codigo' => 'CALE'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Rehabilitación Integral de Occidente',
	        'codigo' => 'CRIO'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Rehabilitación Integral de Oriente',
	        'codigo' => 'CRIOR'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Rehabilitación de Ciegos Eugenia de Dueñas',
	        'codigo' => 'CIEGOS'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Rehabilitación Profesional',
	        'codigo' => 'RP'
        ]);

        Centro::create([
        	'nombre' => 'Consulta Externa y Geriátrica',
	        'codigo' => 'C.EXT'
        ]);

        Centro::create([
        	'nombre' => 'Centro de Rehabilitación Integral para la Niñez y la Adolescencia',
	        'codigo' => 'CRINA'
        ]);
    }
}
