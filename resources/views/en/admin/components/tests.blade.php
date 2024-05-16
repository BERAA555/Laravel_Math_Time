@extends('en.admin.dashboard')
@section('content')

 <!--  content -->
          <div class="content-wrapper">
              <!-- Content -->
              <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Tests</h4>
                <div class = "2">
                  <div class="d-flex flex-wrap" id="icons-container">

                  <!-- test button -->
                      <a href="#" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 140px;">
                          <i style="font-size: 32px;" class='bx bx-task mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">Test 1</p>
                          <p class="icon-name text-capitalize text-truncate mb-0">
                            puan 
                            <!-- <span style="color: green;">10 / 10</span> -->
                            <span style="color: red;">10 / 5</span>
                          </p>
                        </div>  
                      </a>

                      <a href="#" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 140px;">
                          <i style="font-size: 32px;" class='bx bx-book-add mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">Test 1</p>
                        </div>
                      </a>

                      <a href="#" style="color:#697A8D;" class="card icon-card cursor-pointer text-center mb-4 mx-2">
                        <div class="card-body" style="width: 140px;">
                          <i style="font-size: 32px;" class='bx bx-lock-alt mb-2'></i>
                          <p class="icon-name text-capitalize text-truncate mb-0">Test 1</p>
                        </div>
                      </a>
                  </div>
                </div>
              </div>
          </div>

@stop