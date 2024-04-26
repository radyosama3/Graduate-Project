<?php

namespace Database\Factories;

use App\Models\UserHasCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserHasCourse>
 */
class UserHasCourseFactory extends Factory
{
    protected $model = UserHasCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,10),
            'course_id' => rand(1,10),
            'grade' => rand(1,100),
        ];
    }
}
