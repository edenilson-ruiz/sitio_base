<?php

namespace Database\Seeders;

use App\Models\AreaAtencion;
use App\Models\Centro;
use Illuminate\Database\Seeder;

class AreaAtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areasAtencion = [
            'Electrofisiológicos',
            'Instructoría Vocacional',
            'Medicina de Especialidad',
            'Medicina General',
            'Rehabilitación Funcional',
            'Servicios de Apoyo',
            'Terapia Física',
            'Otros Servicios Médicos',
            'Terapia de Lenguaje',
            'Terapia Educativa'
        ];

        foreach($areasAtencion as $area) {
            $area = AreaAtencion::create([
                'nombre' => $area
            ]);
        }

        $areas = AreaAtencion::all();
        $centros = Centro::all();

        // $areas->each(function($item) use ($centros){
        //     $item->centros->saveMany($centros);
        // });
        $areas->each(function($area) use ($centros){
            $area->centros()->attach(
                $centros->random(rand(1,10))->pluck('id')->toArray()
            );
        });

    }
}
