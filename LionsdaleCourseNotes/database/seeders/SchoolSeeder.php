<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name'=>'BMSZC Bláthy Ottó Titusz Informatikai Technikum',
            'address'=>'1032 Budapest, Bécsi út 134',
            'contactName'=>'Krucsay Attila',
            'contactEmail'=>'krucsay.attila@blathy.info'
        ]);
        School::create([
            'name'=>'BGSZC Eötvös Loránd Technikum',
            'address'=>'1204 Budapest, Török Flóris u. 89',
            'contactName'=>'Wolff Erika',
            'contactEmail'=>'wolfferika​@elg-bp.edu.hu'
        ]);
        School::factory(1)->create();
    }
}
