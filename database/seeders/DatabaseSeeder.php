<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use App\Models\UserHasCourse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'type' => 'student',
            'password' => bcrypt('123456789'),
        ]);
        // User::factory(10)->create();
        // Course::factory(10)->create();
        // Lecture::factory(30)->create();
        // UserHasCourse::factory(30)->create();
    }
}
