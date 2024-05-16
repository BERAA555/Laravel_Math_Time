<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function go_to_student_score()  : View
    {        

        $users = DB::table('users')->where('admin' , 0)->orWhere('admin' , 3)->orderBy('score' , 'desc')->get();
        
        if(view()->exists('en.user.components.student_score')){
            return view('en.user.components.student_score' , compact('users'));
        }else{
            return view('error');
        }
    }

    public function go_to_account() : View
    {        

        $student = User::find(Auth::user()->id);
        $stdCourses = $student->StudentCourse ;
        $coures = Course::all();
        $score = 0 ;
        foreach($stdCourses as $stdCourse){
            $score += $stdCourse->score ;
        }
        $student->update([
            'score' => $score ,
        ]);

        if(view()->exists('en.user.components.account')){
            return view('en.user.components.account' , compact('stdCourses','coures', 'score'));
        }else{
            return view('error');
        }
    }

    public function go_to_welcome() : View
    {        
        if(view()->exists('en.user.components.welcome')){
            return view('en.user.components.welcome' );
        }else{
            return view('error');
        }
    }

    public function go_to_update() : View
    {        
        if(view()->exists('en.user.components.update')){
            return view('en.user.components.update');
        }else{
            return view('error');
        }
    }
    public function go_to_changePass() : View
    {        
        if(view()->exists('en.user.components.changePass')){
            return view('en.user.components.changePass');
        }else{
            return view('error');
        }
    }

    public function go_to_courses() 
    {        
        $courses = Course::all()->where('share' , 1);
        $StudentCourses = StudentCourse::all();

        $CoursesId = [];
        $delCoursesId = [] ;

        $delCourses = [];
        $addCourses = [];

        $delCourse = StudentCourse::all()->where('users_id' , Auth::user()->id);

        foreach ($delCourse as $delCours){
            array_push($delCourses , $delCours) ;
            array_push($delCoursesId , $delCours->courses_id) ;
        }

        foreach ($courses as $course){
            array_push($CoursesId , $course->id) ;
        }

        $addCoursesIds = array_diff($CoursesId , $delCoursesId) ;
        
        foreach ($addCoursesIds as $addCoursesId){
            array_push($addCourses , Course::find($addCoursesId)) ;

        }

        if($courses){

            if(view()->exists('en.user.components.courses')){
                return view('en.user.components.courses' , compact( 'addCourses', 'delCourses' ,'courses' ));
            }else{
                return view('error');
            }
        }else{
            if(view()->exists('en.user.components.courses')){
                return view('en.user.components.courses' );
            }else{
                return view('error');
            }
        }
    }


    public function admin_request($id){
        if (User::find($id)){

            $user = User::find($id);
            $user->update([
                'admin' => 3 ,
            ]);
            return redirect()->back()->with('addRequest' , "Teaching Request Added Succussfully : )"); 

        }else{
            return view('error');
        }

    }

}
