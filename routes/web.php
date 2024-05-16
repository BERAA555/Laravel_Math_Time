<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentTestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Question;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',  [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('welcome');

Route::get('/lang/{locale}' , function(string $locale){
    if (! in_array($locale, ['en', 'ar', 'tr'])) {
        return view('error');
    }
    session()->put('locale' , $locale);
    return redirect()->back();
})->name('lang');


Route::middleware('auth')->group(function () {

    // admin passing page


    Route::get('/en/account_details', [AdminController::class, 'go_to_account_details'])->name('account.details');
    Route::get('/en/update_account',  [AdminController::class, 'go_to_update_account'])->name('account.update');
    Route::get('/en/dashboard',       [AdminController::class, 'go_to_dashboard'])->name("dashboard");
    Route::get('/en/tests',           [AdminController::class, 'go_to_tests'])->name('tests');
    Route::get('/en/addcourse',       [AdminController::class, 'add_course'])->name('add.course');
    Route::get('/en/addtest',         [AdminController::class, 'add_test'])->name('add.test');
    Route::get('/en/addquestion',     [AdminController::class, 'add_question'])->name('add.question');
    Route::get('/en/editquestion',    [AdminController::class, 'edit_question'])->name('edit.question');
    Route::get('/en/updateQues/{id}', [AdminController::class, 'update_question'])->name('update.question');
    Route::get('/en/requests',        [AdminController::class, 'admin_request'])->name('admin_request');
    Route::get('/en/std_data',        [AdminController::class, 'student_data'])->name('student_data');
    Route::get('/en/changePass',      [AdminController::class, 'change_password'])->name('change_password');
    Route::get('/en/addstd',          [AdminController::class, 'add_std'])->name('add.std');



    Route::get('/en/moreData/{id}',           [AdminController::class, 'more_data'])->name('moreData');

    // for share course
    Route::get('/en/share',           [AdminController::class, 'share'])->name('share.course');

    Route::get('/en/shareCourse/{id}',     [CourseController::class, 'share_course'])->name('course.share');
    Route::get('/en/deleteCourse/{id}',    [CourseController::class, 'delete_course'])->name('course.delete');

    Route::get('/en/sharecourse/{id}',     [CourseController::class, 'share_course_message'])->name('course.share.ms');
    Route::get('/en/deletecourse/{id}',    [CourseController::class, 'delete_course_message'])->name('course.delete.ms');



    //account
    Route::post('register',             [AccountController::class, 'store'])->name("register3");
    Route::post  ('/en/update/{id}',    [AccountController::class, 'updateAccount'])->name('update_account');
    Route::post  ('/en/chPass/{id}',    [AccountController::class, 'changePassword'])->name('change_pass');
    Route::delete('/en/destroy/{id}',   [AccountController::class, 'destroy'])->name('destroy');
    Route::get   ('/en/destroyms/{id}', [AccountController::class, 'destroyMessgae'])->name('destroy.ms');




    //admin Add
    Route::post  ('/en/addCourse'     , [CourseController::class, 'insert'])->name('add_course');
    Route::delete('/en/delCourse/{id}', [CourseController::class, 'delete'])->name('del_course');

    Route::post  ('/en/addTest'     , [TestController::class, 'insert'])->name('add_test');
    Route::delete('/en/addTest/{id}', [TestController::class, 'delete'])->name('del_test');

    Route::post  ('/en/addQuestion'        , [QuestionController::class, 'insert'])->name('add_question');
    Route::delete('/en/addQuestion/{id}'   , [QuestionController::class, 'delete'])->name('del_ques');
    Route::post  ('/en/editQuestion/{id}'  , [QuestionController::class, 'update'])->name('edit_question');

    // admin request
    Route::get('/en/addAdmin/{id}',      [AdminController::class, 'admin_accept'])->name('admin.accept');
    Route::get('/en/deleteAdmin/{id}',   [AdminController::class, 'admin_delete'])->name('admin.delete');



    // user passing page

    Route::get('/en/studentScore',      [UserController::class, 'go_to_student_score'])->name('student.score');
    Route::get('/en/studentAccount',    [UserController::class, 'go_to_account'])->name('student.account');
    Route::get('/en/studentWelcome',    [UserController::class, 'go_to_welcome'])->name('student.welcome');
    Route::get('/en/studentUpdate',     [UserController::class, 'go_to_update'])->name('student.update');
    Route::get('/en/studentChangePass', [UserController::class, 'go_to_changePass'])->name('student.changePass');
    Route::get('/en/studentCourses',    [UserController::class, 'go_to_courses'])->name('student.courses');
    Route::get('/en/adminRequest/{id}', [UserController::class, 'admin_request'])->name('admin.request');




    //  add student course
    Route::post('/en/addstdcourse/{id}'   ,     [StudentCourseController::class, 'add_std_course'])->name('add.stdCourse');
    Route::delete('/en/deletestdcourse/{id}',   [StudentCourseController::class, 'delete_std_course'])->name('delete.stdCourse');
    Route::delete('/en/deletestdcoursems/{id}',   [StudentCourseController::class, 'delete_std_course_ms'])->name('delete.stdCourse.ms');

    Route::get('/en/studentTests/{id}',         [StudentCourseController::class, 'go_to_tests'])->name('student.tests');
    Route::get('/en/studentQuiz/{id}',          [StudentTestController::class, 'go_to_quiz'])->name('student.quiz');


    //  quiz route ( next , previos , finish )
    Route::post('/en/studentNext/',  [StudentTestController::class, 'go_to_next'])->name('student.next');
    Route::get('/en/studentNext',    [UserController::class, 'go_to_welcome']);


    Route::get('/en/studentPrevios/',    [StudentTestController::class, 'go_to_previos'])->name('student.previos');

    Route::post('/en/studentFinish',   [StudentTestController::class, 'go_to_finish'])->name('student.finish');
    Route::get('/en/studentFinish',    [UserController::class, 'go_to_welcome']);




});

require __DIR__.'/auth.php';
