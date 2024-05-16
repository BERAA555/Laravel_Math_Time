<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Test::create([
            'course_id' => 1 ,
            'name' => 'Test_1' ,
            'level' => 'hard' ,
        ]);
        Test::create([
            'course_id' => 1 ,
            'name' => 'Test_2' ,
            'level' => 'middle' ,
        ]);


        Test::create([
            'course_id' => 2 ,
            'name' => 'Test_1' ,
            'level' => 'easy' ,
        ]);
        Test::create([
            'course_id' => 2 ,
            'name' => 'Test_2' ,
            'level' => 'middle' ,
        ]);
        Test::create([
            'course_id' => 2 ,
            'name' => 'Test_3' ,
            'level' => 'hard' ,
        ]);


        Test::create([
            'course_id' => 3 ,
            'name' => 'Test_1' ,
            'level' => 'easy' ,
        ]);
    }
}
