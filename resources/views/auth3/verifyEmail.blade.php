
@extends('auth3.shape')
@section("content")

      <h5 class="mb-2">Verify Email </h5>
      <p class="mb-4">Thanks for signing up! Before getting started,
          could you verify your email address by clicking on the link we just emailed to you?
          If you didn't receive the email,
          we will gladly send you another
      </p>

      @if (session('status') == 'verification-link-sent')
        <p class="mb-4">
          A new verification link has been sent to the email address you provided during registration.
        </p>
      @endif
    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button class="btn btn-primary d-grid w-100">Resend Verification Email</button>
    </form>
    <div class="text-center">
      <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
        <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
        Back to login
      </a>
    </div>
            
@stop