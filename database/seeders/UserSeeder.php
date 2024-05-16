<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::truncate();   
        User::create([
            'name' => 'beraa',
            'surname' => 'ceze',
            'path' => "assets/photos/6.png" , 
            'admin' => 1 ,
            'score'=> 4500 ,
            'class'=> 1 ,
            'state' => "Very Good" ,
            'email' => 'beraaceze@gmail.com',
            'password' => Hash::make('beraaceze'),
        ]);
        User::create([
            'name' => 'ahmed',
            'surname' => 'ceze',
            'path' => "assets/photos/5.png" , 
            'admin' => 0 ,
            'score'=> 3500 ,
            'class'=> 1 ,
            'state' => "Good" ,
            'email' => 'beraaceze2@gmail.com',
            'password' => Hash::make('beraaceze2'),
        ]);

    }
}
