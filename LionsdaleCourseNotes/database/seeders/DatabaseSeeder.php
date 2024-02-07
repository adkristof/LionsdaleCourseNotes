<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\School;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            SchoolSeeder::class,
            TypeSeeder::class,
            CourseSeeder::class,
            QuizSeeder::class,
        ]);
         \App\Models\User::factory(30)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'role_id' => '1',
         ]);
         $this->call([CourseUserTableSeeder::class]);
    }
}
