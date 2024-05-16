@extends('en.admin.dashboard')
@section('content')



 <!--  content -->
 <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Admin Request</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Class</th>
                <th style="text-align: center;">Share</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course )
                @if ($course->share == 0)
                    <tr>
                        <td style="text-transform: capitalize">
                        {{$course->name}}
                        </td>
                        <td >{{$course->class}}</td>
                        <td>
                        <div class="demo-inline-spacing" style="text-align: center;">
                            <a href="{{route('course.share.ms' , $course->id)}}" style="color: #A1ACB8;" ><i class='bx bx-add-to-queue me-1'></i>Share</a>
                        </div>  
                        </td>
                    </tr>
                @elseif ($course->share == 1)
                <tr>
                    <td style="text-transform: capitalize">
                    {{$course->name}}
                    </td>
                    <td >{{$course->class}}</td>
                    <td>
                    <div class="demo-inline-spacing" style="text-align: center;">
                        <a href="{{route('course.delete.ms' , $course->id)}}" style="color: red;" ><i class="bx bx-trash me-1"></i>Don't Share</a>
                    </div>  
                    </td>
                </tr>    
                @endif
             
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
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">
{{-- share course --}}
  @if (Session::has("shareId"))
                
    <div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Share Course</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        <p>When You Share This Course You Will Not Able To Add A Test To It </p>
        <a style="color: #eee" href="{{route('course.share' , Session::get('shareId'))}}"   >Share</a>
        <button type="button" style="border : none ; background:none ; color: #eee" data-bs-dismiss="toast" aria-label="Close">Cancle</button>
        </div>
        
      </div>
  @endif

{{-- Delete course --}}

  @if (Session::has("deleteId"))
                
  <div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Share Course</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body" >
      <p>When You Delete This Course, It Will Be Deleted For All Students  </p>
      <a style="color: #eee" href="{{route('course.delete' , Session::get('deleteId'))}}">Delete</a>
      <button type="button" style="border : none ; background:none ; color: #eee" data-bs-dismiss="toast" aria-label="Close">Cancle</button>
      </div>
      
    </div>
@endif


{{-- share succussfully --}}
@if (Session::has("shareMessage"))
                
<div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Share Course</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    <p>{{ Session::get('shareMessage')}}</p>
    </div>
    
  </div>
@endif

</div>
@stop