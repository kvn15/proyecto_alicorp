<?php

namespace Database\Factories;

use App\Models\Admin\Asignancion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignacionFactory extends Factory
{

    protected $model = Asignancion::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'participaciones' => $this->faker->randomDigitNotNull(),
            'terminos_condiciones' => $this->faker->boolean(),
            'codigo' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'), 
            'codigo_valido' => $this->faker->boolean(),
        ];
    }
}
