@extends('en.admin.dashboard')
@section('content')



 <!--  content -->
 <div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Settings /</span> Edit Question</h4>
    <div class="card">
      <h5 class="card-header">All Tests</h5>
      <div class="table-responsive text-nowrap">
  

        <div class="col-xl-12" style="padding-left : 20px">
            <h6 class="text-muted">Course</h6>
            <ul class="nav nav-pills mb-3" role="tablist">

              @foreach ( $courses as $course )
                
                <li class="nav-item">
                  <button type="button" style="text-transform: capitalize" class="nav-link " role="tab" data-bs-toggle="tab" data-bs-target="#course{{$course->id}}" aria-controls="navs-pills-top-home" aria-selected="true">
                    {{$course->name}}
                  </button>
                </li>
              @endforeach

              
            </ul>
            <hr>
            <div style="padding: 0px" class="tab-content">

            @foreach ($courses as $course )
                <div class="tab-pane fade" id="course{{$course->id}}" role="tabpanel">
                  <h6 class="text-muted">Tests</h6>
                  <ul  class="nav nav-pills " role="tablist">
                    @foreach ( $course->Tests as $test )
                      <li class="nav-item">
                        <button type="button" class="nav-link " style="text-transform: capitalize" role="tab" data-bs-toggle="tab" data-bs-target="#test{{$test->id}}" aria-controls="navs-pills-top-home" aria-selected="true">
                          {{$test->name}}
                        </button>
                      </li>
                    @endforeach 
                  </ul>
                  <hr>
                  <div class="tab-content">
                    @foreach ( $course->Tests as $test )
                      <div class="tab-pane fade " id="test{{$test->id}}" role="tabpanel">
                         
                        <table class="table" style="width: 100%">
                          <thead>
                            <tr>
                              <th>Question</th>
                              <th>True Answer </th>
                              <th></th>
                            </tr>
                          </thead>

                          @foreach ( $test->Questions as $question )
                          <tbody>
                            <tr>
                              <td style="padding-right: 80px ;max-width : 500px ; overflow: hidden; text-overflow:ellipsis;  white-space: nowrap;  ">{{$question->question}}</td>
                              <td style="padding-right: 80px">{{$question->true_answer}}</td>
                              <td>
                                <form style="padding-right : 120px" action="{{route('del_ques' , $question->id )}}" method="POST">
                                  @csrf
                                  @method('delete')   
                                    <a style="color: green;" href="{{route('update.question',$question->id )}}"><i class='bx bxs-message-square-edit me-1'></i> Edit </a>
                                    <button style="color: red; border:none ; background:none" ><i class="bx bx-trash me-1"></i> Delete</button>
                                  </form>
                              </td>
                            </tr>
                          </tbody>
                          @endforeach 
                        </table>
                      </div>
                    @endforeach 
                  </div>

                </div>
            @endforeach

            </div>
        </div>

      </div>
    </div>
  </div>
</div>
            <!-- / Content -->

@stop

@section("error")
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

  {{--  delete success --}}

  @if (Session::has("deletemessage"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Delete Question</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('deletemessage')}}
        </div>
      </div>
  @endif
</div>
@stop