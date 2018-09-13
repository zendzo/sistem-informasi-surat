@extends('auth.login-v15.layouts')

@section('form')
<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
  {{ csrf_field() }}
  <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
      <span class="label-input100">Username</span>
      <input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Enter email">
      <span class="focus-input100"></span>
      @if ($errors->has('email'))
      <span class="input-error" role="alert">
          {{ $errors->first('email') }}
      </span> 
      @endif
  </div>

  <div class="container-login100-form-btn">
      <button class="login100-form-btn">Request</button>
  </div>
</form>
@endsection