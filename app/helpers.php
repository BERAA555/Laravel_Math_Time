<?php

use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\Auth;

function courses(){
    
    $courses = Course::all();
    return $courses;

}
function stdCourses(){
    
    $stdCourses = StudentCourse::all()->where('users_id' , Auth::user()->id);
    return $stdCourses;

}

function number(){
    
    return 10;

}

?>