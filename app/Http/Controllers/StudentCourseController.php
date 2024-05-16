<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\StudentQuestion;
use App\Models\StudentTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    // add_std_course
    public function add_std_course($id){


        if(Course::find($id)){

        $tests = Course::find($id)->Tests;
        
        StudentCourse::create([
            'courses_id' =>  $id,
            'users_id' => Auth::user()->id,
            'score' => 0,
        ]);
        
        $studentCourse = StudentCourse::all();

        $studentCourseId = $studentCourse->where('users_id' , Auth::user()->id)->where('courses_id' , $id)->first();
        foreach ($tests as $test) {
            if ($test == $tests[0]){
                StudentTest::create([
                    'tests_id' =>  $test->id,
                    'student_courses_id' =>$studentCourseId->id ,
                    'score' => 0 ,
                    'key' => 1 ,
                ]);
            }else{
                StudentTest::create([
                    'tests_id' =>  $test->id,
                    'student_courses_id' =>$studentCourseId->id ,
                    'score' => 0 ,
                    'key' => 0 ,
                ]);

            }
    

            $studentTests = StudentTest::all();
            $studentTestId = $studentTests->where('tests_id' , $test->id)->where('student_courses_id' , $studentCourseId->id )->first();
            
                // return $studentTestId ;
            $questions = Test::find($studentTestId->tests_id)->Questions;

            foreach ($questions as $question) {

                $qestions = Test::find($test->id)->Questions;    
                    StudentQuestion::create([
                    'questions_id' =>  $question->id,
                    'student_tests_id' => $studentTestId->id,
                    'score' => 0,

                ]);
                
            }

        }
        return redirect()->back()->with('addcourse' , ""); 

        }else{
            return view('error');
        }
    }



    public function delete_std_course_ms($id){

        return redirect()->back()->with('deleteId' ,$id); 

    }



    // delete_std_course
    public function delete_std_course($id){


        if(StudentCourse::all()->where('courses_id' , $id)->where('users_id', Auth::user()->id)){

            $stdCourse = StudentCourse::all()->where('courses_id' , $id)->where('users_id', Auth::user()->id);  
            // return $stdCourse ;
            StudentCourse::destroy($id); 

            $student = User::find(Auth::user()->id);
            $stdCourses = $student->StudentCourse ;
            $score = 0 ;
            foreach($stdCourses as $stdCoursee){
                $score += $stdCoursee->score ;
            }
            $student->update([
                'score' => $score ,
            ]);


            return redirect()->back()->with('deletecourse' , ""); 

        }else{
            return view('error');
        }

    }


//  go to tests

    public function go_to_tests($id)  
    {   
        if (StudentCourse::find($id)){

            $studentTests = StudentCourse::find($id)->StudentTest;
            $testsData = Test::all();

            if(view()->exists('en.user.components.tests' )){
                return view('en.user.components.tests' ,compact('studentTests' ,'testsData' ) );
            }else{
                return view('error');
            }
        }else{
            return view('error');
        }  
    }

}
