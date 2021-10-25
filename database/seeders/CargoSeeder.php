<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            'Director de Centro',
            'Administrador de Centro',
            'Médico de Turno',
            'Enfermera',
            'Terapista',
            'Secretaria'
        ];

        foreach($cargos as $cargo) {
            Cargo::create([
                'nombre' => $cargo
            ]);
        }
    }
}
