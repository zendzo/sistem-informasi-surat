@extends('auth.login-v3.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
  @csrf
    <span class="login100-form-logo">
      <i class="zmdi zmdi-landscape"></i>
    </span>

    <span class="login100-form-title p-b-34 p-t-27">
     {{ ucfirst(Request::segment(1)) }}
    </span>

    <div class="wrap-input100 validate-input" data-validate = "Enter Email">
      <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
      <span class="focus-input100" data-placeholder="&#x2709;"></span>
    </div>
    @if ($errors->has('email'))
    <span class="input-error validate-input" role="alert">
        {{ $errors->first('email') }}
    </span> 
    @endif

    <div class="wrap-input100 validate-input" data-validate="Enter password">
      <input class="input100" type="password" name="password" placeholder="Password">
      <span class="focus-input100" data-placeholder="&#xf191;"></span>
    </div>
    @if ($errors->has('password'))
    <span class="input-error" role="alert">
        {{ $errors->first('password') }}
    </span> 
    @endif

    <div class="contact100-form-checkbox">
      <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
      <label class="label-checkbox100" for="ckb1">
        Remember me
      </label>
    </div>

    <div class="container-login100-form-btn">
      <button class="login100-form-btn">
        {{ ucfirst(Request::segment(1)) }}
      </button>
    </div>

    <div class="text-center p-t-90">
      <a class="txt1" href="{{ route('register') }}">
        Don't have an account ? Sign Up
      </a>
    </div>
  </form>
@endsection