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
    }
}
