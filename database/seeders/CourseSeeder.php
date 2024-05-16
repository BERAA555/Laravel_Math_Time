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
        Course::create([
            'name' => 'math' ,
            'class' => 1 ,
        ]);

        Course::create([
            'name' => 'laravel' ,
            'class' => 2 ,
        ]);

        Course::create([
            'name' => 'IQ' ,
            'class' => 1 ,
        ]);
    }
}
