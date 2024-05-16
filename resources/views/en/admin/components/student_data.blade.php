@extends('en.admin.dashboard')
@section('content')

 <!--  content -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Student Data</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th >Rank</th>
                        <th></th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user )
                      <tr>
                        <td>
                            <img src="{{asset('/assets/img/'.$user->path)}}" style="width: 50px ; height:50px"  alt="rounded-circle avatar"
                            class="rounded-circle img-fluid" style="width: 100px;">
                        </td>
                        <td style="text-transform: capitalize">{{$user->name}} {{$user->surname}}</td>
                      
                        <td>{{$user->email}}</td>
                        <td>Student</td>
                        <td>
                          <div class="demo-inline-spacing" style="text-align: center;">
                            <a href="{{route('moreData' , $user->id)}}" style="color: #3D3D56; border:none ; background : none "><i class='bx bx-add-to-queue me-1'></i>See More Data</a>
                            {{-- <a href="{{route('destroy.ms' , $user->id)}}" style="color: red; border:none ; background : none "><i class="bx bx-trash me-1"></i>Delete</a> --}}

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
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

{{-- Delete account --}}

  @if (Session::has("deleteId"))
                
  <div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Delete Account</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body" >
      <p>Are Your Sure To Delete This Account ? </p>
      <form action="{{route('destroy' , Session::get('deleteId'))}}" method="POST" >
        @csrf
        @method('delete')
        <button style="color: #eee; border:none ; background : none "><i class="bx bx-trash me-1"></i> Delete</button>
        <a type="button" style="border : none ; background:none ; color: #eee" data-bs-dismiss="toast" aria-label="Close">Cancle</a>
      </form>
      </div>
      
    </div>
@endif


{{-- Delete succussfully --}}

@if (Session::has("deletesuccess"))
                
<div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Delete Account</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    <p>{{ Session::get('deletesuccess')}}</p>
    </div>
    
  </div>
@endif

</div>
@stop