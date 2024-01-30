<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory(3)->create();
        Course::create([
            'name'=>'PHP basics',
            'level'=>'beginner',
            'c_route'=>'php.basics',
            'type_id'=>1
        ]);
        Course::create([
            'name'=>'PHP authentication',
            'level'=>'intermediete',
            'c_route'=>'php.auth',
            'type_id'=>3
        ]);
        Course::create([
            'name'=>'PHP security',
            'level'=>'professional',
            'c_route'=>'php.security',
            'type_id'=>2
        ]);

    }
}
