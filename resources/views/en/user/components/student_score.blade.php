@extends('en.user.dashboard')
@section('content')



 <!--  content -->
 <div class="content-wrapper" dir="{{ __('user.direct')}}">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">{{ __('user.stdScore')}}</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>{{ __('user.photo')}}</th>
                <th>{{ __('user.name')}}</th>
                <th style="">{{ __('user.score')}} </th>
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
              
                <td> {{$user->score}} </td>
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