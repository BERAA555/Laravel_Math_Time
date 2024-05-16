@extends('en.user.dashboard')
@section('content')

 <!--  content -->
 <div class="content-wrapper">
            <!-- Content -->

   
       <div class="container-xxl" >
      <div class="authentication-wrapper authentication-basic container-p-y">
      <h4 dir="{{ __('user.direct')}}" class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('user.accountSettings')}} /</span>{{ __('user.changePassword')}}</h4>

        <div class="authentication-inner">
          <!-- Register -->
              <div class="card" >
                <div class="card-body">    
                  <form id="formAuthentication" class="mb-3" action="{{route('change_pass' , Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3 form-password-toggle">
                      <div class="d-flex justify-content-between" dir="{{ __('user.direct')}}">
                        <label  class="form-label" for="password">{{ __('user.currentPassword')}}</label>
                      </div>
                      <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="currentPassword" placeholder="" aria-describedby="password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>

                    <div class="mb-3 form-password-toggle">
                      <div class="d-flex justify-content-between" dir="{{ __('user.direct')}}">
                        <label class="form-label" for="password">{{ __('user.newPassword')}}</label>
                      </div>
                      <div class="input-group input-group-merge" >
                        <input type="password" id="password" class="form-control" name="newPassword" placeholder="" aria-describedby="password">
                        <span class="input-group-text cursor-pointer" ><i class="bx bx-hide" ></i></span>
                      </div>
                    </div>

                    <div class="mt-2" dir="{{ __('user.direct')}}">
                        <button type="submit" class="btn btn-primary me-2">{{ __('user.savechange')}}</button>
                        <a href="{{route('student.account')}}" type="reset" class="btn btn-outline-secondary">{{ __('user.cancle')}}</a>
                    </div>
                  </form>
                </div>
              </div>
              <hr>
          <!-- /Register -->
        </div>
      </div>
    </div>

@stop

@section("error")
<div class="toast-container" style=" position: fixed; top : 110px ; right : 20px">

  @if (Session::has("update"))
                
    <div class="bs-toast toast fade show bg-success  screen2" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Update </div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" >
        {{Session::get('update')}}
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