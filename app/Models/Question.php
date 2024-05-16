<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [ 'question' , 'photo' ,'answer_1' ,'answer_2' ,'answer_3' ,'answer_4' ,'answer_5' , 'true_answer','test_id'];

    public function StudentQuestion() {
        return $this->hasOne(StudentQuestion::class , 'questions_id');  
    }

}       
