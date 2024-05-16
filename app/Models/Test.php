<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [ 'name' , 'level' , 'course_id'];


    public function Questions() {
        return $this->hasMany(Question::class , 'test_id');  
    }

    public function StudentTest() {
        return $this->hasOne(StudentTest::class , 'tests_id');  
    }
}
