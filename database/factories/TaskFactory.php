<?php
// php artisan make:factory TaskFactory --model=Task
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // populating the database with fake data
            'title' =>fake()->sentence,
            'description' =>fake()->paragraph,
            'long_description' =>fake()->paragraph(8,true),
            'completed' =>fake()->boolean
        ];
    }
}
