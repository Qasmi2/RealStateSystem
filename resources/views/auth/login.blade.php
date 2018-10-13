<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Montviro Booking Portal</title>
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
body, html {
    height: 100%;
    margin: 0;
}
.bg {
    /* The image used */
    background-image: url("../public/images/bg-image.png");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
    </head>
    <body>
    <div class="bg">
        <div class="container">
            
            <!--- ---->
            <div class="row justify-content-center" style="padding-top:175px;">
                 <div class="col-md-6">
                     <div class="card" style="opacity: 0.8;">
                        <div class="card-header">Login Form</div>

                            <div class="card-body">
            <!-- -->
                 <div class="text-center" style="color:#a6468c !important;">
                    <h1>Montrivo Booking Portal </h1>
                </div>

               <!-- <div class="links">
                  Website Underconstruction
                </div> -->
                <div>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-md-4 col-form-label ">Enter Email</label>

                            <div class="col-md-8">
                                <input id="email" type="email" placeholder="Enter Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label ">Enter Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" placeholder="Enter your password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" sytle="color:white" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }} 
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                            <button type="submit" class="btn btn-default" style="background-color:#a6468c !important;color:white;">
                                    {{ __('Login') }}
                                </button>

                                  <a class="btn btn-link" style="color:#a6468c !important;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
            </div>        </div>
        </div>
        </div>
    </body>
</html>
