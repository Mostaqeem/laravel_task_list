<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * php artisan db:seed
     * php artisan migrate:refresh --seed   =>replace and seed the data again delete the previous data not recomanded on depolyment
     */
    public function run(): void
    {
        User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
