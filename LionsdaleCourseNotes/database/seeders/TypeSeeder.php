<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'type'=>"Web Development",
            'slug'=>'webdev'
        ]);
        Type::create([
            'type'=>"Desktop App Development",
            'slug'=>'appdev'
        ]);
        Type::create([
            'type'=>"Mobile App Development",
            'slug'=>'mobiledev'
        ]);
    }
}
