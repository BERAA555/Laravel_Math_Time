<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Question ;
use App\Models\StudentCourse;
use App\Models\Test;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function go_to_account_details() : View
    {        
        if(view()->exists('en.admin.components.account')){
            return view('en.admin.components.account');
        }else{
            return view('error');
        }
    }
    public function go_to_update_account() : View
    {        
        if(view()->exists('en.admin.components.update')){
            return view('en.admin.components.update');
        }else{
            return view('error');
        }
    }
    public function go_to_dashboard() : View
    {        
        if(view()->exists('en.admin.components.welcome')){
            return view('en.admin.components.welcome');
        }else{
            return view('error');
        }
    }
    public function go_to_tests() : View
    {        
        if(view()->exists('en.admin.components.tests')){
            return view('en.admin.components.tests');
        }else{
            return view('error');
        }
    }

//  add and edit route

    public function add_course() 
    {        
        $courses = Course::all();
        if(view()->exists('en.admin.components.add_course')){
            return view('en.admin.components.add_course', compact('courses'));
        }else{
            return view('error');
        }
    }
    public function add_test() : View
    {        
        $courses = Course::all()->where('share' , 0);
        if(view()->exists('en.admin.components.add_test')){
            return view('en.admin.components.add_test' , compact('courses'));
        }else{
            return view('error');
        }
    }

    public function add_question() : View
    {        
        $courses = Course::all()->where('share' , 0);
        $tests = Test::all();
        if(view()->exists('en.admin.components.add_question')){
            return view('en.admin.components.add_question', compact( 'tests' , 'courses'));
        }else{
            return view('error');
        }
    }

    public function edit_question() : View
    {        
        $courses = Course::all()->where('share' , 0);
        $tests = Test::all();
        if(view()->exists('en.admin.components.edit_question')){
            return view('en.admin.components.edit_question' , compact('courses' , 'tests'));
        }else{
            return view('error');
        }
    }

    public function update_question($id) : View
    {        
        if (Question::find($id)){   

            $question = Question::find($id);
            $tests = Test::all();
            $courses = Course::all();


            if(view()->exists('en.admin.components.update_question')){
                return view('en.admin.components.update_question' , compact('question', 'tests', 'courses'));
            }else{
                return view('error');
            }
        }else{
            return view('error');
        }
    }



    public function admin_request() 
    {        
        $users = User::all()->where('admin' , 3);
        if(view()->exists('en.admin.components.admin_request')){
            return view('en.admin.components.admin_request' , compact('users'));
        }else{
            return view('error');
        }
    }


    public function student_data() : View
    {        
        $users = DB::table('users')
                ->where('admin' , 0)->orWhere('admin' , 3)->get();

        if(view()->exists('en.admin.components.student_data')){
            return view('en.admin.components.student_data' , compact('users' ));
        }else{
            return view('error');
        }
    }

    public function change_password() : View
    {        
        if(view()->exists('en.admin.components.changePass')){
            return view('en.admin.components.changePass');
        }else{
            return view('error');
        }
    }

    public function add_std() : View
    {        
        if(view()->exists('en.admin.components.add_std')){
            return view('en.admin.components.add_std');
        }else{
            return view('error');
        }
    }


    // 

    public function  admin_accept($id) 
    {        

        $user = User::find($id);
        $user->update([
            'admin' => 1 ,
        ]);
        return redirect()->back();
    }


    public function admin_delete($id) 
    {        
        $user = User::find($id);
        $user->update([
            'admin' => 0 ,
        ]);
        return redirect()->back();
    }

    public function share() 
    {        
        $courses = Course::all();
        if(view()->exists('en.admin.components.shareCourse')){
            return view('en.admin.components.shareCourse' , compact('courses'));
        }else{
            return view('error');
        }
    }

    public function more_data($id) 
    {        
        $user = User::find($id);
        $stdCourses = $user->StudentCourse ; 
        $courses = Course::all();
        if(view()->exists('en.admin.components.more_data')){
            return view('en.admin.components.more_data' , compact('stdCourses' , 'user', 'courses'));
        }else{
            return view('error');
        }
    }
    


    
}
