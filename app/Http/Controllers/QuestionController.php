<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function insert(Request $request){

        $request->validate([
            'test_id'      => ['required' , 'max:255'],
            'question'     => ['max:255'] ,  
            'photo'        => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],  
            'answer_1'     => ['required' , 'max:255'] ,
            'answer_2'     => ['required' , 'max:255'] ,  
            'answer_3'     => ['required' , 'max:255'] ,  
            'answer_4'     => ['required' , 'max:255'] ,  
            'answer_5'     => ['required' , 'max:255'] ,  
            'true_answer'  => ['required' , 'max:255'] ,              
        ]);

          if($request->photo ){
            $path =$request->file('photo')->store("tests",'beraa');
          }else{
            $path = NULL ;
          }

        Question::create([
            'test_id'      => $request->test_id ,
            'question'     => $request->question ,
            'photo'        => $path ,
            'answer_1'     => $request->answer_1,
            'answer_2'     => $request->answer_2,
            'answer_3'     => $request->answer_3,
            'answer_4'     => $request->answer_4,
            'answer_5'     => $request->answer_5,
            'true_answer'  => $request->true_answer,
        ]);
        
        return redirect()->back()->with('addmessage' , 'The Question Added Successfully : )'); 

   
    }   


    public function update(Request $request , $id){

      $request->validate([
        'test_id'      => ['required' , 'max:255'],
        'question'     => ['max:255'] ,  
        'photo'        => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],  
        'answer_1'     => ['required' , 'max:255'] ,
        'answer_2'     => ['required' , 'max:255'] ,  
        'answer_3'     => ['required' , 'max:255'] ,  
        'answer_4'     => ['required' , 'max:255'] ,  
        'answer_5'     => ['required' , 'max:255'] ,  
        'true_answer'  => ['required' , 'max:255'] ,              
    ]);

      if($request->photo ){
        $path =$request->file('photo')->store("tests",'beraa');
      }else{
        $path = NULL ;
      }

      $question = Question::find($id);  

      if($question->photo){
        Storage::disk('beraa')->delete($question->photo);
      }

      $question->update([
        'test_id'      => $request->test_id ,
        'question'     => $request->question ,
        'photo'        => $path ,
        'answer_1'     => $request->answer_1,
        'answer_2'     => $request->answer_2,
        'answer_3'     => $request->answer_3,
        'answer_4'     => $request->answer_4,
        'answer_5'     => $request->answer_5,
        'true_answer'  => $request->true_answer,
    ]);
    
    // return redirect()->back() ; 
    return redirect()->back()->with('editmessage' , 'The Question Updated Successfully : )'); 


    }


    public function delete($id){
        
      $Qes = Question::find($id);

      if($Qes->photo){
        Storage::disk('beraa')->delete($Qes->photo);
      }

      Question::destroy($id); 
      return redirect()->back()->with('deletemessage' , 'The Question Deleted Successfully : )'); 

  }

    
}
