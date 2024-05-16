
@extends('auth3.shape')
@section("content")

  <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register2')}}">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">name</label>
      <input
        type="text"
        class="form-control"
        id="name"
        name="name"
        placeholder="Enter your name"
        autofocus
        required
      />
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">surname</label>
      <input
        type="text"
        class="form-control"
        id="surname"
        name="surname"
        placeholder="Enter your surname"
        autofocus
        required
      />
    </div>

    <div class="mb-3">
      <label for="class" class="form-label">Class</label>
      <select class="form-control form-select" name = "class" id="exampleFormControlSelect1" aria-label="Default select example">
          <option value="">select</option>
          <option value="1">First Grade</option>
          <option value="2">Second Grade</option>
          <option value="3">Third Grade</option>
          <option value="4">Fourth Grade</option>
          <option value="5">Fifth Grade</option>
          <option value="6">Sixth Grade</option>
        </select>
    </div>
    
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
    </div>
    <div class="mb-3 form-password-toggle">
      <label class="form-label" for="password">Password</label>
      <div class="input-group input-group-merge">
        <input
          type="password"
          id="password"
          class="form-control"
          name="password"
          aria-describedby="password"
          required
        />
        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
      </div>
    </div>
    <div class="mb-3 form-password-toggle">
      <label class="form-label" for="password">Confirm Password</label>
      <div class="input-group input-group-merge">
        <input
          type="password"
          id="password"
          class="form-control"
          name="password_confirmation"
          aria-describedby="password"
          required
        />
        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
      </div>
    </div>

    <button class="btn btn-primary d-grid w-100">Sign up</button>
  </form>

  <p class="text-center">
    {{-- <span>Already have an account?</span> <a href="{{route ('login')}}">  <span>Sign in instead</span></a> --}}
  </p>

  @if($errors -> any() )
           <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $error )
                    <li style="text-align: center ; list-style: none;">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
    @endif 
  @stop


