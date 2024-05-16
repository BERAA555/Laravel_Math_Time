@extends('en.admin.dashboard')

@section('css')
<style>
  @media screen and (max-width: 540px) {
  .screen2 {

    width : 300px
    }
  }

@media screen and (min-width: 540px) and (max-width: 780px) {
  .screen2 {

    width : 300px
  }
 }
</style>
@stop


@section('content')

 <!--  content -->
 <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Settings /</span> Add Course</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">Course Details</h5>
            <!-- Account -->

            <hr class="my-0">
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{route('add_course')}}" >
                @csrf
                @method('POST')
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Course Name</label>
                    <input class="form-control" type="text" id="name" name="name"  autofocus="">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Class</label>
                    <select id="country" class="select2 form-select" name="class">
                      <option value="">select</option>
                      <option value="1">First Grade</option>
                      <option value="2">Second Grade</option>
                      <option value="3">Third Grade</option>
                      <option value="4">Fourth Grade</option>
                      <option value="5">Fifth Grade</option>
                      <option value="6">Sixth Grade</option>
                    </select>
                  </div>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Add Course</button>
                  <a href="{{route('dashboard')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
 
 <div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
      <h5 class="card-header">All Course</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Course Name</th>
              <th>Class</th>
              <th style="text-align: center;"></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($courses as $course)
            <tr>
              <td>{{$course->name}}</td>
              <td>{{$course->class}}</td>
              <td>
                  <div class="demo-inline-spacing " style="text-align: center;" >
                    <form action="{{route('del_course' , $course->id )}}" method="POST">
                      @csrf
                      @method('delete')   
                      <button style="color: red; border:none ; background:none" ><i class="bx bx-trash me-1"></i> Delete</button>
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
 
@stop


@section("error")
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

  @if (Session::has("deletemessage"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Delete Course</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('deletemessage')}}
        </div>
      </div>
  @endif

  @if (Session::has("addmessage"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Add Course</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('addmessage')}}
        </div>
      </div>
  @endif  
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
