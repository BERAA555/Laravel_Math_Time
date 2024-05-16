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
                <th style="text-align: center;">Answer</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user )
              <tr>
                <td>
                    <img src="{{asset('/assets/img/'.$user->path)}}" style="width: 60px ; height:60px"  alt="rounded-circle avatar"
                    class="rounded-circle img-fluid" style="width: 100px;">
                </td>
                <td style="text-transform: capitalize">{{$user->name}} {{$user->surname}}</td>
              
                <td>{{$user->email}}</td>
                <td>
                <div class="demo-inline-spacing" style="text-align: center;">
                      <a href="{{route('admin.accept' ,$user->id )}}" style="color: green;" href="#"><i class="bx bx-check me-1"></i> Accept</a>
                      <a href="{{route('admin.delete' ,$user->id )}}" style="color: red;" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
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