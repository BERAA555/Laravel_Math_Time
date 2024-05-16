<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $fillable = [ 'courses_id' , 'users_id' , 'score'];

    public function StudentTest() {
        return $this->hasMany(StudentTest::class , 'student_courses_id'); 
    }

  
}
