<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function insert(Request $request ){

        $request->validate([
            'name'  => ['required' , 'max:255' , 'unique:courses'] ,  
            'class' => ['required' , 'max:255'],
        ]);

        Course::create([
            'name' => $request->name,
            'class' => $request->class,
        ]);
        
        return redirect()->back()->with('addmessage' , 'The Course Added Successfully : )'); 
   
    }

        
    public function delete($id){
        
        Course::destroy($id); 
        return redirect()->back()->with('deletemessage' , 'The Course Deleted Successfully : )'); 

    }


//  share course

public function share_course_message($id) 
{        
    return redirect()->back()->with('shareId' , $id); 
 
 
}

public function delete_course_message($id) 
{        

    if( Course::find($id)){
        return redirect()->back()->with('deleteId' , $id); 
    }else{
        return view('error');
    }

 
}


    public function share_course($id) 
    {
        if( Course::find($id)){
            $course = Course::find($id);
            $course->update([
                "share" => 1 ,
            ]);
        }else{
            return view('error');
        }    
        
        return redirect()->route('share.course')->with('shareMessage' , "The Course Shared Succussfully : )"); 

     
    }
    
    public function delete_course($id) 
    {        
        if( Course::find($id)){
            $course = Course::find($id);
            $course->update([
                'share' => 0 ,
            ]);

            $stdCourses = StudentCourse::all()->where('courses_id' , $id);

            foreach($stdCourses as $stdCourse){
                StudentCourse::destroy($stdCourse->id) ;
            }

            return redirect()->route('share.course')->with('shareMessage' , "The Course Deleted Succussfully : )"); 

        }else{
            return view('error');
        } 
    }





}
