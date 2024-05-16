<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;
use App\Models\StudentQuestion;
use App\Models\StudentTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentTestController extends Controller
{

    public function go_to_quiz($id)  
    {        
        if(StudentTest::find($id)){
            // data of selected test by id came from studentTest model  
            $stdTest = StudentTest::find($id); 
            // data of question for selected test came from studentQuestion model 
            $stdQuestions = $stdTest->StudentQuestion ; 
            // data of question for selected test came from questions model 
            $questionDatas = Test::find($stdTest->tests_id)->Questions;
            //  count of this questions
            $quesCount = count($questionDatas);
            // number for count answered question
            $quesnumber = 0 ;

            // return $stdTest;

            if ($questionDatas != "[]"){

                $testData = $questionDatas[$quesnumber] ;

                session()->put('questionDatas', $questionDatas);  
                session()->put('stdQuestions', $stdQuestions);  
                session()->put('stdTest', $stdTest);  

                session()->put('id', $id);  


                session()->put('quesnumber', $quesnumber);  
                session()->put('quesCount', $quesCount);  



                
                if(view()->exists('en.user.components.tests' )){
                    return view('en.user.components.exam' , compact('testData' , 'quesCount' , 'quesnumber'));
                }else{
                    return view('error');
                }

            }else{

                $stdTest->update([
                    'key' => 2,
                    'score' => -1,
                ]);

                $nextStudentTest = StudentTest::find(($stdTest->id)+1);
                if ($nextStudentTest){
                    if ($nextStudentTest->student_courses_id ==$stdTest->student_courses_id){
                        $nextStudentTest->update([
                            'key' => 1,
                        ]);
                    }
                }
                return Redirect::back()->withErrors("This Test Don't have Questions");
            }
        }else{
            return view('error');
        }

    }

    public function go_to_next(Request $request )  
    {        
// session()->forget('key');



        $questionDatas = session('questionDatas');  
        $stdQuestions = session('stdQuestions');   

        $quesnumber = session('quesnumber');  
        $quesCount = session('quesCount');  
        $id = session('id');  


        if($quesnumber < count($stdQuestions) && $quesnumber >= 0 && count($stdQuestions) == $quesCount && StudentTest::find($id) != "" ){

            $stdQuestion = $stdQuestions[$quesnumber] ;

            if ($request->answer ==  $questionDatas[$quesnumber]->true_answer){
                $stdQuestion->update([
                    'score' => 100,
                ]);

            }else{
                $stdQuestion->update([
                    'score' => 0,
                ]);
            }
            if($quesnumber < count($stdQuestions)-1){

                $quesnumber = $quesnumber + 1 ;     
                session()->put('quesnumber', $quesnumber);  
            }

            $testData = $questionDatas[$quesnumber] ;

            if(view()->exists('en.user.components.tests' )){
                return view('en.user.components.exam' ,  compact('testData' , 'quesCount' , 'quesnumber'));
            }else{
                return view('error');
            }
        }else{
            return view('error');
        }
    }


    public function go_to_previos()  
    {        
        $questionDatas = session('questionDatas');    
        $stdQuestions = session('stdQuestions');    

        $quesnumber = session('quesnumber');  
        $quesCount = session('quesCount');  
        $id = session('id');  


        if($quesnumber < count($stdQuestions) && $quesnumber >= 0 && count($stdQuestions) == $quesCount && StudentTest::find($id) != ''){


            if($quesnumber > 0){

                $quesnumber = $quesnumber - 1 ;     
                session()->put('quesnumber', $quesnumber);  
            }

            $testData = $questionDatas[$quesnumber] ;
            
            
            if(view()->exists('en.user.components.tests' )){
                return view('en.user.components.exam' ,  compact('testData' , 'quesCount' , 'quesnumber'));
            }else{
                return view('error');
            }
        }else{
            return view('error');
        }
    }

    public function go_to_finish(Request $request )  
    {        


        $stdQuestions = session('stdQuestions');    
        $questionDatas = session('questionDatas');    
        $stdTest = session('stdTest'); 
        $quesnumber = session('quesnumber');  
        $quesCount = session('quesCount');  
        $id = session('id');  
     
        if($quesnumber < count($stdQuestions) && $quesnumber >= 0 && count($stdQuestions) == $quesCount && StudentTest::find($id) != ''){

            $stdQuestion = $stdQuestions[$quesnumber] ; 
            if ($request->answer ==  $questionDatas[$quesnumber]->true_answer){
                $stdQuestion->update([
                    'score' => 100,
                ]);

            }else{
                $stdQuestion->update([
                    'score' => 0,
                ]);
            }

            $StudenTest = StudentTest::find($stdQuestion->student_tests_id);
            $questionScores = 0;

            foreach($stdQuestions as $score){
                $questionScores += $score->score ;
            }

            $testScore = number_format((float)($questionScores / count($stdQuestions)), 1, '.', '') ;
            $nextStudentTest = StudentTest::find(($stdTest->id)+1);


            if ($testScore > 50 ){
                $StudenTest->update([
                    'score' => $testScore,
                    'key' => 2,
                ]);
                //  open next test 
                if ($nextStudentTest){
                    if ($nextStudentTest->student_courses_id ==$stdTest->student_courses_id){
                        $nextStudentTest->update([
                            'key' => 1,
                        ]);
                    }
                }
            }else{

                $StudenTest->update([
                    'key' => 1,
                ]);
            }

            $allStdCourses= User::find(Auth::user()->id)->StudentCourse;
            $user= User::find(Auth::user()->id);

            $stdScore = 0 ;
        
            foreach ($allStdCourses as $allStdCourse){
                $courseScore = 0 ;
                $allStdTests = StudentCourse::find($allStdCourse->id)->StudentTest;
                if ($allStdTests != "[]" ){
                foreach ($allStdTests as $allStdTest){
                    if ($allStdTest->score > 40  ){
                        $courseScore += $allStdTest->score  ;
                    }
                }
                }

                $allStdCourse->update([
                    'score' => $courseScore,
                ]);
                
            }
            foreach ($allStdCourses as $allStdCourse){
                $stdScore += $allStdCourse->score; 
            }
            $user->update([
                'score' => $stdScore,
            ]);

            
            if(view()->exists('en.user.components.testScore'  )){
                return view('en.user.components.testScore' , compact('testScore'));
            }else{
                return view('error');
            } 
        }else{
            return view('error');
        }
    }

}
