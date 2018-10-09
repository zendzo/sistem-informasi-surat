@extends('auth.login-v2.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
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

    <div class="wrap-input100 validate-input" data-validate="Enter password">
      <span class="btn-show-pass">
        <i class="zmdi zmdi-eye"></i>
      </span>
      <input class="input100" type="password" name="password">
      <span class="focus-input100" data-placeholder="Password"></span>
    </div>
    @if ($errors->has('password'))
      <span class="input-error" style="color: #c80000;">
          {{ $errors->first('password') }}
      </span> 
    @endif

    <div class="container-login100-form-btn">
      <div class="wrap-login100-form-btn">
        <div class="login100-form-bgbtn"></div>
        <button class="login100-form-btn">
          Login
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