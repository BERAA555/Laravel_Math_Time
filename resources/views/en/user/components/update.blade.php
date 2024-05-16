@extends('en.user.dashboard')

@section('css')
<style>
    @media screen and (max-width: 540px) {
    .screen2 {
      padding:10px;
      font-size:10px
      }
    }

  @media screen and (min-width: 540px) and (max-width: 780px) {
    .screen2 {
      padding:10px;
      font-size:10px
    }
   }
</style>
@stop
@section('content')
  
 <!--  content -->
 <div class="content-wrapper">
      <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y" dir="{{ __('user.direct')}}">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('user.accountSettings')}} /</span> {{ __('user.updateAccount')}}</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <h5 class="card-header">{{ __('user.profileDetails')}}</h5>
            <!-- Account -->
            <form id="formAccountSettings" method="POST" action="{{route('update_account',Auth::user()->id)}}" enctype="multipart/form-data"> 
            @method('POST')
            @csrf
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{asset('/assets/img/'.Auth::user()->path)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">{{ __('user.uploadNewPhoto')}}</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" name="photo" class="account-file-input" hidden="" accept=".jpg, .png, image/jpeg, image/png">
                  </label>
                  <a href="{{route('student.changePass')}}" type="submit" style="color: #eee;" class="me-2 mb-4 btn btn-primary deactivate-account screen2">{{ __('user.changePassword')}}</a>
                  <p class="text-muted mb-0">{{ __('user.allowphoto')}}</p>
                </div>
              </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">{{ __('user.name')}}</label>
                    <input class="form-control" type="text" id="firstName" name="name" placeholder="{{Auth::user()->name}}" autofocus="">

                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">{{ __('user.lastName')}}</label>
                    <input class="form-control" type="text" name="surname" id="lastName" placeholder="{{Auth::user()->surname}}">

                  </div>
              

                  <div class="mb-3 col-md-6">
                  <label class="form-label" for="country">{{ __('user.class')}}</label>
                  <select id="country" class="select2 form-select" name="class">
                    <option value="{{Auth::user()->class}}">{{Auth::user()->class}}</option>
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
                  <button type="submit" class="btn btn-primary me-2">{{ __('user.savechange')}}</button>
                  <a href="{{route('student.account')}}" type="reset" class="btn btn-outline-secondary">{{ __('user.cancle')}}</a>
                  <br><br>
                </div>
              </form>
            </div>
            @if($errors -> any() )
            <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors -> all() as $error )
                      <li style="text-align: center ; list-style: none;">{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <!-- /Account -->
          </div>
  
        </div>
      </div>
    </div>
    <!-- / Content -->
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