<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Permission;

class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Permission::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->jobTitle(),
            'display_name' => $this->faker->unique()->jobTitle(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
