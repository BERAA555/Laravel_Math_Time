@extends('en.user.dashboard')
@section('content')

<!--  content -->
<div class="content-wrapper">
            <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y" dir="{{ __('user.direct')}}" >
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('user.accountSettings')}} /</span> {{ __('user.profile')}}</h4>

  <section >
  <div class="container ">
  
    <div class="row card">
      <div class="col-lg-4">
        <div >
          <div class="card-body text-center">
          <img src="{{asset('/assets/img/'.Auth::user()->path)}}" style="width: 100px ; height:100px"  alt="rounded-circle avatar"
            class="rounded-circle img-fluid" style="width: 100px;">
            <h5 style="text-transform: capitalize" class="my-3">{{Auth::user()->name}} {{Auth::user()->surname}}</h5>

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
                <p class="mb-0">{{ __('user.rank')}}</p>
              </div>
              <div class="col-sm-3">
                <p class="text-muted mb-0">{{ __('user.student')}}</p>
              </div>
              <div class="col-sm-6">
                @if (Auth::user()->admin == 3)
                  <label  style="color: green;" href="#"><i class="bx bx-check me-1"></i> {{ __('user.teachingRequest')}}</label>
                @elseif ((Auth::user()->admin == 0))  
                  <a  href="{{route('admin.request' , Auth::user()->id)}}" style="color: #5C5C70;" href="#"><i class='bx bx-add-to-queue'></i> {{ __('user.teachingRequest')}}</a> 
                @endif
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('user.name')}}</p>
              </div>
              <div class="col-sm-9">
                <p style="text-transform: capitalize" class="text-muted mb-0">{{ Auth::user()->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('user.lastName')}}</p>
              </div>
              <div class="col-sm-9">
                <p style="text-transform: capitalize" class="text-muted mb-0">{{ Auth::user()->surname }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('user.email')}}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('user.class')}}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->class}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">{{ __('user.score')}}</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$score}}</p>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
    <br>
    <div class="row card">
      <div class="col-lg-12">
        <div class=" mb-4">
          <div class="card-body">
            @foreach ($stdCourses as $stdCourse )

              <div class="row">
                <div class="col-sm-3">
                  @php
                   $name = $coures->where( 'id' , $stdCourse->courses_id)->first();
                  @endphp
                  <p style="text-transform: capitalize" class="mb-0">{{ $name->name}}</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$stdCourse->score}}</p>
                </div>
              </div>
              <hr>
              
            @endforeach
      
          </div>

        </div>
        
      </div>
      
      </div>
      <br>


    <div class="row">
      <div>
        <a href="{{route('destroy.ms' , Auth::user()->id)}}" type="submit" class="btn btn-danger deactivate-account" style="margin-bottom: 5px">{{ __('user.deleteAccount')}}</a>
        <a href="{{route('student.update')}}" style="color: #eee" type="submit" class="btn btn-primary deactivate-account">{{ __('user.updateAccount')}}</a>
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


@if (Session::has("addRequest"))
                
<div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Add Request </div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" >
    {{Session::get('addRequest')}}
    </div>
  </div>
@endif

</div>

@stop