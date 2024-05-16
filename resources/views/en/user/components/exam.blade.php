<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Tests </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
   <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
  </head>

  <body >
    <!-- Layout wrapper -->
    <div class=" layout-content-navbar" style="width: 100%;margin:auto;">
        <!-- Layout container -->
        <div class="col-md-6 col-lg-4" style="margin:auto">
         
                <h6 class="mt-4 text-muted">Question {{$quesnumber+1}} <span>/ {{$quesCount}}</span></h6>

                @if ($quesnumber == 0 && $quesnumber != $quesCount-1 )  
                  {{-- case1  --}}

                <div class="card">
                  <div class="nav-align-top ">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                            {{ __('user.Text')}}
                          </button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                            {{ __('user.Image')}}
                          </button>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div style="height: 220px" class="tab-pane fade active show " id="navs-top-home" role="tabpanel">
                          <textarea style="height: 220px" style="resize: none;" class="form-control" id="exampleFormControlTextarea1" readonly rows="7">{{$testData->question}}</textarea>
                           </div>
                        <div style="height: 220px" class="tab-pane fade  " id="navs-top-profile" role="tabpanel">
                          <img  style="height: 220px" class="card-img-top" src="{{asset('/assets/img/'.$testData->photo)}}" alt="Card image cap"> 
                        </div>
                      </div>
                    </div>
                    {{-- form  --}}
                  <form action="{{route('student.next')}}" method="POST">
                    @csrf
                    @method('POST')  
                  <div class="card-body">
                  <p dir = "{{ __('user.direct')}}" class="card-text">{{ __('user.answers ')}} </p><hr>
                    <div class="row gy-3">
                      <div class="col-md">
                        <div class="form-check">
                                                                  {{-- input name  --}}
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_1}}" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            {{$testData->answer_1}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_2}}" id="flexRadioDefault2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            {{$testData->answer_2}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_3}}" id="flexRadioDefault3">
                          <label class="form-check-label" for="flexRadioDefault3">
                            {{$testData->answer_3}}  
                          </label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_4}}" id="flexRadioDefault4">
                          <label class="form-check-label" for="flexRadioDefault4">
                            {{$testData->answer_4}}  
                          </label>
                        </div>
                         <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_5}}" id="flexRadioDefault5">
                          <label class="form-check-label" for="flexRadioDefault5">
                            {{$testData->answer_5}}    
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                      <span style="border-bottom:1px solid #A1ACB8;"></span>
                  </ul>
                  <div class="card-body" style="text-align:right ;">
                    {{-- change link to button --}}
                    <button style="border: none ; background:none ; color:#787BFF;" class="card-link">{{ __('user.next')}}</button>
                  </div>
                </form>
                </div>
                  {{-- case2  --}}

                @elseif ($quesnumber > 0 && $quesnumber < $quesCount-1  )

                  <div class="card">
                    <div class="nav-align-top ">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                              {{ __('user.Text')}}
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                              {{ __('user.Image')}}
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div style="height: 220px" class="tab-pane fade active show " id="navs-top-home" role="tabpanel">
                            <textarea style="height: 220px" style="resize: none;" class="form-control" id="exampleFormControlTextarea1" readonly rows="7">{{$testData->question}}</textarea>
                             </div>
                          <div style="height: 220px" class="tab-pane fade  " id="navs-top-profile" role="tabpanel">
                            <img  style="height: 220px" class="card-img-top" src="{{asset('/assets/img/'.$testData->photo)}}" alt="Card image cap"> 
                          </div>
                        </div>
                      </div>

                  <form action="{{route('student.next')}}" method="POST">
                    @csrf
                    @method('POST')  
                    <div class="card-body">
                    <p dir = "{{ __('user.direct')}}" class="card-text">{{ __('user.answers ')}} </p><hr>
                    <div class="row gy-3">
                      <div class="col-md">
                        <div class="form-check">
                                                                  {{-- input name  --}}
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_1}}" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            {{$testData->answer_1}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_2}}" id="flexRadioDefault2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            {{$testData->answer_2}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_3}}" id="flexRadioDefault3">
                          <label class="form-check-label" for="flexRadioDefault3">
                            {{$testData->answer_3}}  
                          </label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_4}}" id="flexRadioDefault4">
                          <label class="form-check-label" for="flexRadioDefault4">
                            {{$testData->answer_4}}  
                          </label>
                        </div>
                         <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_5}}" id="flexRadioDefault5">
                          <label class="form-check-label" for="flexRadioDefault5">
                            {{$testData->answer_5}}    
                          </label>
                        </div>
                      </div>
                    </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <span style="border-bottom:1px solid #A1ACB8;"></span>
                    </ul>
                    <div class="card-body" style="text-align:right ;">
                      <a href="{{route('student.previos')}}" class="card-link">{{ __('user.Previos ')}}</a>
                      <button style="border: none ; background:none ; color:#787BFF;" class="card-link">{{ __('user.next ')}}</button>
                    </div>
                  </form>
                  </div>


                  @elseif ($quesnumber == $quesCount-1)

                  {{-- case3  --}}

                  <div class="card">
                    <div class="nav-align-top ">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                              {{ __('user.Text')}}
                            </button>
                          </li>
                          <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                              {{ __('user.Image')}}
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div style="height: 220px" class="tab-pane fade active show " id="navs-top-home" role="tabpanel">
                            <textarea style="height: 220px" style="resize: none;" class="form-control" id="exampleFormControlTextarea1" readonly rows="7">{{$testData->question}}</textarea>
                             </div>
                          <div style="height: 220px" class="tab-pane fade  " id="navs-top-profile" role="tabpanel">
                            <img  style="height: 220px" class="card-img-top" src="{{asset('/assets/img/'.$testData->photo)}}"   alt="Card image cap"> 
                          </div>
                        </div>
                      </div>
                    <form action="{{route('student.finish')}}" method="POST">
                      @csrf
                      @method('POST')  
                    <div class="card-body">
                    <p dir = "{{ __('user.direct')}}" class="card-text">{{ __('user.answers ')}}</p><hr>
                    <div class="row gy-3">
                      <div class="col-md">
                        <div class="form-check">
                                                                  {{-- input name  --}}
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_1}}" id="flexRadioDefault1" >
                          <label class="form-check-label" for="flexRadioDefault1">
                            {{$testData->answer_1}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_2}}" id="flexRadioDefault2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            {{$testData->answer_2}}  
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_3}}" id="flexRadioDefault3">
                          <label class="form-check-label" for="flexRadioDefault3">
                            {{$testData->answer_3}}  
                          </label>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_4}}" id="flexRadioDefault4">
                          <label class="form-check-label" for="flexRadioDefault4">
                            {{$testData->answer_4}}  
                          </label>
                        </div>
                         <div class="form-check">
                          <input class="form-check-input" type="radio" name="answer" value="{{$testData->answer_5}}" id="flexRadioDefault5">
                          <label class="form-check-label" for="flexRadioDefault5">
                            {{$testData->answer_5}}    
                          </label>
                        </div>
                      </div>
                     </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <span style="border-bottom:1px solid #A1ACB8;"></span>
                    </ul>
                    <div class="card-body" style="text-align:right ;">
                      @if ($quesnumber == 0)
                        <button style="border: none ; background:none ; color:red;" class="card-link">{{ __('user.finish ')}}</button>
                      
                      @else
                        <a href="{{route('student.previos')}}" class="card-link">{{ __('user.Previos ')}}</a>
                        <button style="border: none ; background:none ; color:red;" class="card-link">{{ __('user.finish ')}}</button>
                      @endif

                    </div>
                    </form>
                  </div>
                  @endif
          </div>

        </div>

       
        <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
