<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseUserTable>
 */
class CourseUserTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seen=fake()->boolean();
        if($seen){
            return [
                'seen'=>$seen,
                'completed'=>fake()->boolean(),
                'user_id'=>fake()->numberBetween(1,31),
                'course_id'=>fake()->numberBetween(1,6),
            ];
        }
        else {
            return[
                'seen'=>$seen,
                'completed'=>false,
                'user_id'=>fake()->numberBetween(1,31),
                'course_id'=>fake()->numberBetween(1,6),
            ];
        }
    }
}
