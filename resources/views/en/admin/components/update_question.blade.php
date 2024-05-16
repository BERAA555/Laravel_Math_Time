@extends('en.admin.dashboard')
@section('content')


 <!--  content -->
 <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Settings /</span> Update Question</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">Question Details</h5>
            <!-- Account -->

            <hr class="my-0">
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{route('edit_question' , $question->id) }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="country">Select Test</label>
                    <select style="width:50%" id="country" class="select2 form-select" name="test_id">
                      @php
                          $testName = $tests->where('id',$question->test_id)->first();
                          $courseName = $courses->where('id',$testName->course_id)->first();
                      @endphp
                      <option value="{{$question->test_id}}">{{$testName->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$courseName->name}}</option>
                      @foreach ($courses as $course )
                        @foreach ($course->Tests as $test )
                        <option value="{{$test->id}}">
                          <div class="demo-inline-spacing" style="padding: 10px">
                            <span class="badge bg-primary">{{$test->name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <span class="badge bg-secondary"> {{$course->name}} </span>
                          </div> 
                        </option>
                        @endforeach
                        @endforeach
                    </select>
                  </div>


                    <div class=" mb-3 col-md-6">
                        <span class="input-group-text">Write Question</span>
                        <textarea  name="question" style="height: 80px;" class="form-control" aria-label="With textarea" placeholder="" >{{$question->question}}</textarea>
                    </div>

                    <div class="mb-3 col-md-6" >
                        <!-- <label for="formFile" class="form-label">Select Photo Question</label> -->
                        <span class="input-group-text">Select Photo's Question</span>
                        <input name="photo"  style="height: 80px;" class="form-control" type="file" id="formFile">
                    </div>

                  <div class="mb-3 col-md-2">
                    <label for="firstName" class="form-label">Answer 1</label>
                    <input name="answer_1" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->answer_1}}" autofocus="">
                  </div>

                  <div class="mb-3 col-md-2">
                    <label for="firstName" class="form-label">Answer 2</label>
                    <input name="answer_2" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->answer_2}}" autofocus="">
                  </div>
                  

                  <div class="mb-3 col-md-2">
                    <label for="firstName" class="form-label">Answer 3</label>
                    <input name="answer_3" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->answer_3}}" autofocus="">
                  </div>
                  

                  <div class="mb-3 col-md-2">
                    <label for="firstName" class="form-label">Answer 4</label>
                    <input name="answer_4" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->answer_4}}" autofocus="">
                  </div>
                  

                  <div class="mb-3 col-md-2">
                    <label for="firstName" class="form-label">Answer 5</label>
                    <input name="answer_5" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->answer_5}}" autofocus="">
                  </div>
                  
                  <div class="mb-3 col-md-12" >
                    <label for="firstName" class="form-label">True Answer</label>
                    <input name="true_answer" style="width : 50%" class="form-control" type="text" id="firstName" name="firstName" value="{{$question->true_answer}}" autofocus="">
                  </div>

                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Update Question</button>
                  <a href="{{route('dashboard')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
@stop

@section("error")
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

  {{--  add success --}}

  @if (Session::has("editmessage"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Update Question</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('editmessage')}}
        </div>
      </div>
  @endif  
  {{--  any error --}}
  @if($errors -> any() )

    @foreach ($errors -> all() as $error )
    <div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Error : (</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
          {{$error}}
        </div>
      </div>
    @endforeach
  @endif

</div>
@stop