<?php

namespace Database\Seeders;

use App\Models\CourseUserTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseUserTable::factory(30)->create();
        CourseUserTable::create([
                'seen'=>true,
                'completed'=>false,
                'user_id'=>31,
                'course_id'=>1,
        ]);
        CourseUserTable::create([
            'seen'=>true,
            'completed'=>true,
            'user_id'=>31,
            'course_id'=>2,
        ]);
        CourseUserTable::create([
            'seen'=>false,
            'completed'=>false,
            'user_id'=>31,
            'course_id'=>3,
        ]);
        
    }
}
