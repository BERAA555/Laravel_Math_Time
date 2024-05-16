<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [ 'name' , 'class' ,'share'];

    public function Tests() {
        return $this->hasMany(Test::class , 'course_id');  
    }

    public function StudentCourse() {
        return $this->hasOne(StudentCourse::class , 'courses_id');  
    }

}
