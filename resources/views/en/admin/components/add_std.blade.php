
@extends('en.admin.dashboard')
@section("content")


<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add Settings /</span> Add Student</h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header">Add Student</h5>
          <!-- Account -->

          <hr class="my-0">
          <div class="card-body">
            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register3')}}">
              @method('POST')
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Enter name"
                  value="{{old('name')}}"
                  autofocus

                />
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">surname</label>
                <input
                  type="text"
                  class="form-control"
                  id="surname"
                  name="surname"
                  placeholder="Enter surname"
                  value="{{old('surname')}}"
                  autofocus
                />
              </div>
          
              <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-control form-select" name = "class" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option value="">select</option>
                    <option value="1">First Grade</option>
                    <option value="2">Second Grade</option>
                    <option value="3">Third Grade</option>
                    <option value="4">Fourth Grade</option>
                    <option value="5">Fifth Grade</option>
                    <option value="6">Sixth Grade</option>
                  </select>
              </div>
              
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    aria-describedby="password"
                    
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Confirm Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password_confirmation"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
          
              <button class="btn btn-primary d-grid w-100">Add Student</button>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>
  </div>
</div>


<div class="content-wrapper">
  
</div>
    
@stop

@section("error")
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

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

