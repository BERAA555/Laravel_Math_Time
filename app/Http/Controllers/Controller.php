<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentCourse;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // dashboard

    public function dashboard()
    {        
        if (Auth::user()->admin == 1 || Auth::user()->admin == 2){
            return view('en.admin.components.welcome');
        }elseif (Auth::user()->admin == 0 || Auth::user()->admin == 3 ){
            return view('en.user.components.welcome' );
        } 
    }


    
}
