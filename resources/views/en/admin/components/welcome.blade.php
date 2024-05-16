@extends('en.admin.dashboard')
@section('content')

 <!--  content -->

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
              <div class="d-flex align-items-start row">
                <div class="col-sm-6">
                  <div class="card-body">
                    <h5 class="card-title text-primary mb-4" style="text-transform: capitalize">Hi ... {{Auth::user()->name}} {{Auth::user()->surname}}  </h5>
                    <hr>
                    <h6 class="mb-4">Abu Hurairah (May Allah be pleased with him) reported:</h6>
                    <p>The Messenger of Allah (ﷺ) said, "Allah makes the way to Jannah easy for him who treads the path in search of knowledge."  </p>
                    <p class="mb-4">
                      [Muslim].
                    </p>
                    <hr>
                    <p class="mb-4">
                      Say Bismillah and start <br>
                      Good luck  <br>
                       ♥ ♥ ♥
                    </p>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img src="/assets/img/illustrations/welcome.jpg" height="300" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
 <!--  content -->
@stop

