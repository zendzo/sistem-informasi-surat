@extends('auth.login-v1.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
  @csrf
  <span class="login100-form-title">
    {{ __(Request::segment(1)) }}
  </span>

  @if ($errors->has('username'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('username') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Username is required">
    <input class="input100" type="text" name="username" placeholder="Username" value="{{ old('username') }}">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-user" aria-hidden="true"></i>
    </span>
  </div>

  @if ($errors->has('email'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('email') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-envelope" aria-hidden="true"></i>
    </span>
  </div>

  @if ($errors->has('password'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('password') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Password is required">
    <input class="input100" type="password" name="password" placeholder="Password">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-lock" aria-hidden="true"></i>
    </span>
  </div>

  @if ($errors->has('password_confirmation'))
    <div class="text-center p-t-12">
      <a class="txt2" href="#" style="color: #c80000;">
          {{ $errors->first('password_confirmation') }}
      </a>
    </div>
  @endif
  <div class="wrap-input100 validate-input" data-validate = "Password is required">
    <input class="input100" type="password" name="password_confirmation" placeholder="Password Confirmation">
    <span class="focus-input100"></span>
    <span class="symbol-input100">
      <i class="fa fa-lock" aria-hidden="true"></i>
    </span>
  </div>
  
  <div class="container-login100-form-btn">
    <button class="login100-form-btn">
      {{ Request::segment(1) }}
    </button>
  </div>

  <div class="text-center p-t-12">
    <span class="txt1">
      Forgot
    </span>
    <a class="txt2" href="#">
      Username / Password?
    </a>
  </div>

  <div class="text-center p-t-136">
    <a class="txt2" href="{{ route('login') }}">
      Login
      <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </a>
  </div>
</form>
@endsection