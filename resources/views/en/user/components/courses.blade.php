@extends('en.user.dashboard')
@section('content')



 <!--  content -->
 <div class="content-wrapper" dir="{{ __('user.direct')}}">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">{{ __('user.addCourses')}}</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>{{ __('user.courseName')}}</th>
                <th>{{ __('user.class')}}</th>
                <th style="text-align: center;"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ( $addCourses  as $addCourse )

                <tr>    
                  <td style="text-transform: capitalize">{{$addCourse->name}}</td>
                  <td>{{$addCourse->class}}</td>
                  <td>
                      <div class="demo-inline-spacing" style="text-align: center;">
                        <form action="{{route('add.stdCourse' , $addCourse->id)}}" method="POST">
                          @csrf
                          @method('POST')
                          <button  style="color: #5C5C70;border:none ; background:none"><i class='bx bx-add-to-queue me-1'></i> {{ __('user.add')}}</button> 
                        </form>
                      </div>  
                  </td>
                </tr>
              @endforeach 

              @foreach ( $delCourses  as $delCourse )
                @php
                    $course = $courses->find($delCourse->courses_id);
                @endphp
              <tr>    
                <td style="text-transform: capitalize">{{$course->name}}</td>
                <td>{{$course->class}}</td>
                <td>
                    <div class="demo-inline-spacing" style="text-align: center;">
                      <form action="{{route('delete.stdCourse.ms' , $delCourse->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button style="color: red;border:none ; background:none" ><i class="bx bx-trash me-1"></i> {{ __('user.delete')}}</button>
                    </form>
                    </div>  
                </td>
              </tr>
            @endforeach


              
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
            <!-- / Content -->
@stop
@section("error")
{{-- Delete account --}}
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px" dir="{{ __('user.direct')}}">

@if (Session::has("deleteId"))
                
<div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true" dir="{{ __('user.direct')}}">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">{{ __('user.delete')}}</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    <p>{{ __('user.surefordelete')}}<br>{{ __('user.loseallpoints')}}  </p>
    <form action="{{route('delete.stdCourse' , Session::get('deleteId'))}}" method="POST" >
      @csrf
      @method('delete')
      <button style="color: #eee; border:none ; background : none "><i class="bx bx-trash me-1"></i> {{ __('user.delete')}}</button>
      <a type="button" style="border : none ; background:none ; color: #eee" data-bs-dismiss="toast" aria-label="Close">{{ __('user.cancle')}}</a>
    </form>
    </div>
    
  </div>
@endif


@if (Session::has("addcourse"))
                
<div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true" dir="{{ __('user.direct')}}">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">{{ __('user.addCourse')}} </div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    {{-- {{Session::get(__('course'))}} --}}
    {{ __('user.thecourseaddedsuccess')}} : )
    </div>
  </div>
@endif

@if (Session::has("deletecourse"))
                
<div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true" dir="{{ __('user.direct')}}">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">{{ __('user.delete')}} </div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    {{ __('user.thecoursedeletedsuccess')}} : ) 
    </div>
  </div>
@endif

</div>

@stop
