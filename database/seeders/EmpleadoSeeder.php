<?php

namespace Database\Seeders;

use App\Models\AreaAtencion;
use App\Models\Empleado;
use Illuminate\Database\Seeder;
use App\Models\AreaAtencionCentro;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Empleado::factory(10)->create();

        $areas = AreaAtencionCentro::all()->take(10);
        $empleados = Empleado::all();

        $areas->each(function($area) use ($empleados){
            $area->empleados()->attach(
                $empleados->random(rand(1,1))->pluck('id')->toArray()
            );
        });
    }
}
