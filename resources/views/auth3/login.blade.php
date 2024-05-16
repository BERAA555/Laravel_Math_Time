
@extends('auth3.shape')
@section("content")

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
          type="text"
          class="form-control"
          id="email"
          name="email"
          placeholder=""
          autofocus
          required
        />
      </div>
      <div class="mb-3 form-password-toggle">
        <div class="d-flex justify-content-between">
          <label class="form-label" for="password">Password</label>
          <a href="{{route('password.request')}}">
            <small>Forgot Password?</small>
          </a>
        </div>
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
      <div class="mb-3">
        <div class="form-check">
          <input class="form-check-input" name="remember" type="checkbox" id="remember-me"  />
          <label class="form-check-label" for="remember-me"> Remember Me </label>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
      </div>
    </form>
    {{-- <p class="text-center"> <a href="{{route('register')}}">  <span>Create an account</span> </a> </p> --}}
@stop

