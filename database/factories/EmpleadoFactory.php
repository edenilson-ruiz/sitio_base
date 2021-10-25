<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Profesion;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition()
    {
        $profesiones = Profesion::all();
        $cargos = Cargo::all();

        return [
			'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'correo' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber,
            'fecha_contratacion' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'foto' => $this->faker->imageUrl($width = 180, $height = 180),
            'direccion' => $this->faker->address,
            'profesion_id' => $profesiones->random()->id,
            'cargo_id' => $cargos->random()->id,
        ];
    }
}



