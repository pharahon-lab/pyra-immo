<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Communes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommunesFactory extends Factory
{
    

    
    protected $model = Communes::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'city_id' => City::factory(),
        ];
    }
}
