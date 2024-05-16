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
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th >Score</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                    <img src="{{asset('/assets/img/'.$user->path)}}" style="width: 60px ; height:60px"  alt="rounded-circle avatar"
                    class="rounded-circle img-fluid" style="width: 100px;">
                </td>
                <td style="text-transform: capitalize">{{$user->name}} {{$user->surname}}</td>
              
                <td>{{$user->email}}</td>
                <td>
                    {{$user->score}}
                </td>
              </tr>
       
              
            </tbody>
          </table>

          <br>

          <table class="table">
            <thead>
              <tr>
                <th>Course NAme</th>
                <th>Score</th>
     
              </tr>
            </thead>
            <tbody>
                @foreach ($stdCourses as $stdCourse )
                @php
                $name = $courses->where( 'id' , $stdCourse->courses_id)->first();
               @endphp
                <tr>
                    <td style="text-transform: capitalize">{{ $name->name}}</td>
                    <td>  {{$stdCourse->score}}  </td>
                </tr>
     
              @endforeach
      
            </tbody>
          </table>
            {{-- <div class="col-lg-6">
              <div class=" mb-4">
                <div class="card-body">
                  @foreach ($stdCourses as $stdCourse )
      
                    <div class="row">
                      <div class="col-sm-3">
                        @php
                         $name = $courses->where( 'id' , $stdCourse->courses_id)->first();
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
            </div> --}}
        </div>
      </div>
      </div>
    </div>
            <!-- / Content -->
@stop