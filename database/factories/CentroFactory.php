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
			'centro_nombre' => $this->faker->name,
			'centro_codigo' => $this->faker->name,
			'centro_codcent' => $this->faker->name,
			'centro_direccion' => $this->faker->name,
        ];
    }
}
