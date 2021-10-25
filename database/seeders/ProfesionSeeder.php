<?php

namespace Database\Seeders;

use App\Models\Profesion;
use Illuminate\Database\Seeder;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profesiones = [
            'Médico Rehabilitador',
            'Fisioterapeuta',
            'Logopeda',
            'Terapeuta Ocupacional',
            'Psicologo Clínico',
            'Neropsicólogo',
            'Enfermera',
            'Otro Profesional',
        ];

        foreach($profesiones as $profesion) {
            Profesion::create([
                'nombre' => $profesion
            ]);
        }
    }
}
