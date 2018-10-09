@extends('auth.login-v2.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
  @csrf
    <span class="login100-form-title p-b-26">
      {{ ucfirst(Request::segment(1)) }}
    </span>
    <span class="login100-form-title p-b-48">
      <i class="zmdi zmdi-font"></i>
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
      <input class="input100" type="text" name="email" value="{{ old('email') }}">
      <span class="focus-input100" data-placeholder="Email"></span>
    </div>
    @if ($errors->has('email'))
      <span class="input-error" style="color: #c80000;">
          {{ $errors->first('email') }}
      </span> 
    @endif

    <div class="container-login100-form-btn">
      <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <button class="login100-form-btn">
          Send Request
        </button>
      </div>
    </div>

    <div class="text-center p-t-115">
      <span class="txt1">
        Don’t have an account?
      </span>

     <a class="txt2" href="{{ route('register') }}">
        Register
      </a>
    </div>
  </form>
@endsection