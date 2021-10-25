<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CentroFactory extends Factory
{
    protected $model = Centro::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'codigo' => $this->faker->name,
			'codcent' => $this->faker->name,
			'direccion' => $this->faker->name,
        ];
    }
}
