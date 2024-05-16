<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'test_id' => 1 ,
            'question' => '5 * 10 = ' ,
            'true_answer' => '50' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '45' ,
            'answer_2' => '55' ,
            'answer_3' => '40' ,
            'answer_4' => '50' ,
            'answer_5' => '51' ,

        ]);
        Question::create([
            'test_id' => 1 ,
            'question' => '7 * 6 = ' ,
            'true_answer' => '42' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '45' ,
            'answer_2' => '44' ,
            'answer_3' => '40' ,
            'answer_4' => '42' ,
            'answer_5' => '43' ,

        ]);
        Question::create([
            'test_id' => 2 ,
            'question' => '11 * 3 = ' ,
            'true_answer' => '33' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '32' ,
            'answer_2' => '30' ,
            'answer_3' => '34' ,
            'answer_4' => '33' ,
            'answer_5' => '35' ,

        ]);

        Question::create([
            'test_id' => 2 ,
            'question' => '11 + 3 + 14 = ' ,
            'true_answer' => '28' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '27' ,
            'answer_2' => '28' ,
            'answer_3' => '25' ,
            'answer_4' => '31' ,
            'answer_5' => '26' ,

        ]);

        Question::create([
            'test_id' => 4 ,
            'question' => '11 + 3 - 14 = ' ,
            'true_answer' => '0' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '1' ,
            'answer_2' => '3' ,
            'answer_3' => '2' ,
            'answer_4' => '0' ,
            'answer_5' => '4' ,

        ]);

        Question::create([
            'test_id' => 5 ,
            'question' => '11 * 3 - 10 = ' ,
            'true_answer' => '23' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '33' ,
            'answer_2' => '24' ,
            'answer_3' => '23' ,
            'answer_4' => '22' ,
            'answer_5' => '21' ,

        ]);

        Question::create([
            'test_id' => 5 ,
            'question' => '12 * 3 - 6 = ' ,
            'true_answer' => '30' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '29' ,
            'answer_2' => '30' ,
            'answer_3' => '31' ,
            'answer_4' => '28' ,
            'answer_5' => '33' ,

        ]);

        Question::create([
            'test_id' => 6 ,
            'question' => '44 + 6 - 12 = ' ,
            'true_answer' => '38' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '39' ,
            'answer_2' => '37' ,
            'answer_3' => '40' ,
            'answer_4' => '36' ,
            'answer_5' => '38' ,

        ]);

        Question::create([
            'test_id' => 6 ,
            'question' => '( 25 - 15 ) * 2 = ' ,
            'true_answer' => '20' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '18' ,
            'answer_2' => '30' ,
            'answer_3' => '22' ,
            'answer_4' => '20' ,
            'answer_5' => '16' ,

        ]);

        Question::create([
            'test_id' => 6 ,
            'question' => '8 * 6 - 10 = ' ,
            'true_answer' => '38' ,
            'photo' => 'assets/photos/6.png' ,
            'answer_1' => '39' ,
            'answer_2' => '37' ,
            'answer_3' => '40' ,
            'answer_4' => '38' ,
            'answer_5' => '36' ,

        ]);
    }
}
