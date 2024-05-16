@extends('en.admin.dashboard')
@section('content')

 
 <!--  content -->
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Profile</h4>

<section >
<div class="container ">

<div class="row card">
<div class="col-lg-4">
<div >
<div class="card-body text-center" >
  <img src="{{asset('/assets/img/'.Auth::user()->path)}}" style="width: 100px ; height:100px"  alt="rounded-circle avatar"
    class="rounded-circle img-fluid" style="width: 100px;">
  <h5 class="my-3">{{Auth::user()->name}} {{Auth::user()->surname}}</h5>

</div>
</div>
<div class="card mb-4 mb-lg-0">
</div>
</div>
<div class="col-lg-8">
<div class=" mb-4">
<div class="card-body">

  <div class="row">
    <div class="col-sm-3">
      <p class="mb-0">State</p>
    </div>
    <div class="col-sm-9">
      @if (Auth::user()->admin == 1 || Auth::user()->admin == 2)
        <p class="text-muted mb-0">Teacher</p>
      @else
        <p class="text-muted mb-0">Student</p>
      @endif
    </div>

  </div>
  <hr>
  <div class="row">
    <div class="col-sm-3">
      <p class="mb-0">Name</p>
    </div>
    <div class="col-sm-9">
      <p class="text-muted mb-0">{{Auth::user()->name}}</p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-3">
      <p class="mb-0">Surname</p>
    </div>
    <div class="col-sm-9">
      <p class="text-muted mb-0">{{Auth::user()->surname}}</p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-3">
      <p class="mb-0">Email</p>
    </div>
    <div class="col-sm-9">
      <p class="text-muted mb-0">{{Auth::user()->email}}</p>
    </div>
    
  </div>
  <hr><br>

  <div class="row">
      <div>
        <a href="{{route('destroy.ms' , Auth::user()->id)}}" type="submit" class="btn btn-danger deactivate-account" style="margin-bottom: 5px">Delete Account</a>
        <a href="{{route('account.update')}}" type="submit" style="color: #eee ;margin-bottom: 5px" class="btn btn-primary deactivate-account">Update Account</a>
      </div>
    </div>
</div>
</div>

</div>

</div>
</section>
</div>
  <!-- / Content -->

  
@stop

@section("error")
{{-- Delete account --}}
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

@if (Session::has("deleteId"))
                
<div class="bs-toast toast fade show bg-danger  screen2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Delete Account</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    <p>Are you sure you want to delete your account ? </p>
    <form action="{{route('destroy' , Session::get('deleteId'))}}" method="POST" >
      @csrf
      @method('delete')
      <button style="color: #eee; border:none ; background : none "><i class="bx bx-trash me-1"></i> Delete</button>
      <a type="button" style="border : none ; background:none ; color: #eee" data-bs-dismiss="toast" aria-label="Close">Cancle</a>
    </form>
    </div>
    
  </div>
@endif

</div>

@stop