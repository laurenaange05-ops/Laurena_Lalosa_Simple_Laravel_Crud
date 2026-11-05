<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Visitor>
 */
class VisitorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'position' => fake()->randomElement([
                'Student',
                'Teacher',
                'Employee',
                'Visitor',
                'Staff',
            ]),
        ];
    }
}
