<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function insert(Request $request ){

        $request->validate([
            'course_id'   => ['required' , 'max:255'],
            'name'        => ['required' , 'string' , 'max:255'] ,  
            'level'       => ['required' , 'string' , 'max:255'] ,  
        ]);

        Test::create([
            'course_id' => $request->course_id,
            'name' => $request->name,
            'level' => $request->level,
        ]);
        
        return redirect()->back()->with('addmessage' , 'The Test Added Successfully : )'); 

   
    }

    public function delete($id){
        
        Test::destroy($id); 
        return redirect()->back()->with('deletemessage' , 'The Course Deleted Successfully : )'); 

    }
}
