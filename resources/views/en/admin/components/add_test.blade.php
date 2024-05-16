@extends('en.admin.dashboard')
@section('content')


 <!--  content -->
 <div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Settings /</span> Add Test</h4>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">Test Details</h5>
            <!-- Account -->

            <hr class="my-0">
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{route('add_test')}}">
                @csrf
                @method('POST')
                <div class="row">

                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="country">Select Course</label>
                        <select style="width:50%" id="country" class="select2 form-select" name="course_id">
                        <option value="">select</option>
                        @foreach ($courses as $course )
                        <option value="{{$course->id}}">{{$course->name}}</option>
                          
                        @endforeach
                        </select>
                    </div>

                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Test Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="" autofocus="">
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Select Test Level</label>
                    <select  id="country" class="select2 form-select" name="level">
                        <option value="">select</option>
                        <option value="Easy">Easy</option>
                        <option value="Middle">Middle</option>
                        <option value="Hard">Hard </option>
                    </select>
                  </div>
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Add Test</button>
                  <a href="{{route('dashboard')}}" type="reset" class="btn btn-outline-secondary">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
        </div>
      </div>
    </div>
 </div>

 <div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
      <h5 class="card-header">All Tests</h5>
      <div class="table-responsive text-nowrap">
  
        <div class="col-lg-12">
          <div class="demo-inline-spacing mt-3">
            <div class="list-group list-group-horizontal-md text-md-center">
              
              @foreach ($courses as $course )   {{-- start courses for loop--}}
              
              <a class="list-group-item list-group-item-action" id="home-list-item" data-bs-toggle="list" href="#coures{{$course->id}}">{{$course->name}}</a>
            @endforeach         {{-- end courses for loop--}}
              
            </div>
            <div class="tab-content px-0 mt-0">
              @foreach ($courses as $course )   {{-- start courses for loop--}}

                  <div class="tab-pane fade" id="coures{{$course->id}}">

                    <table class="table" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Level </th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach ($course->Tests as $test)  {{-- start test for loop--}}
                        <tbody>
                          <tr>
                            <td style="padding-right: 100px">{{$test->name}}</td>
                            <td style="padding-right: 100px">{{$test->level}}</td>
                            <td>
                              <form style="padding-right : 120px" action="{{route('del_test' , $test->id )}}" method="POST">
                                @csrf
                                @method('delete')   
                                  <button style="color: red; border:none ; background:none" ><i class="bx bx-trash me-1"></i> Delete</button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      @endforeach  {{-- end test for loop--}}
                    </table>
                  </div>
            @endforeach    {{-- end courses for loop--}}
            </div>
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
          <div class="me-auto fw-semibold">Delete Test</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('deletemessage')}}
        </div>
      </div>
  @endif
  {{--  add success --}}

  @if (Session::has("addmessage"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Add Test</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('addmessage')}}
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