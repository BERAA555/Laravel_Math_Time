@extends('en.user.dashboard')
@section('content')


 <!--  content -->
          <div class="content-wrapper" dir="{{ __('user.direct')}}">
              <div class="container-xxl flex-grow-1 container-p-y" >
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> {{ __('user.tests')}}</h4>
                <div class = "2">
                  <div class="d-flex flex-wrap" id="icons-container">
       
                    @foreach ($studentTests as $studentTest )
                    @php
                      $testData = $testsData->where('id' , $studentTest->tests_id)->first() ;
                    @endphp

                    @if ($studentTest->key == 0)
                      <a href="#" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 150px;">
                          <i style="font-size: 32px;" class='bx bx-lock-alt mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">{{$testData->name}} </p>

                        </div>
                      </a>
                    @elseif ($studentTest->key == 1)
                      <a href="{{route('student.quiz' , $studentTest->id )}}" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 150px;">
                          <i style="font-size: 32px;" class='bx bx-book-add mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">{{$testData->name}}</p>
                        </div>
                      </a>
                    @elseif ($studentTest->key == 2 )
             

                      <a href="#" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 160px;">
                          <i style="font-size: 32px;" class='bx bx-task mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">{{$testData->name}}</p>
                          <p class="icon-name text-capitalize text-truncate mb-0">
                            <span style="color: green;">{{ __('user.score')}} : {{$studentTest->score}} %</span> 
                          </p>
                        </div>  
                      </a>

                    @endif

                
                      
                    @endforeach
                  <!-- test button -->
                  </div>
                </div>
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
          </div>
          {{-- /content --}}

@stop