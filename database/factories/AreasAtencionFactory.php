<?php

namespace Database\Factories;

use App\Models\AreasAtencion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AreasAtencionFactory extends Factory
{
    protected $model = AreasAtencion::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
