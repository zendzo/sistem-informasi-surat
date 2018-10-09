<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('login-v15/css/util.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('login-v15/css/main.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <!--===============================================================================================-->
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url({{ asset('login-v15/images/bg-01.jpg') }});">
            <span class="login100-form-title-1">
                {{ __(Request::segment(1)) }}
            </span>
        </div>
        @yield('form')
    </div>
    </div>
  </div>
</body>
<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('login-v15/js/main.js') }}"></script>

</html>