<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
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
            <div class="row justify-content-center" style="padding-top:140px;">
                 <div class="col-md-6">
                     <div class="card" style="opacity: 0.8;">
                        <div class="card-header">Login In Form</div>

                            <div class="card-body">
            <!-- -->
                 <div class="text-center" style="color:#a6468c;">
                    <h1>Montrivo Booking Portal </h1>
                </div>
                @include('flash-message')

               <!-- <div class="links">
                  Website Underconstruction
                </div> -->
                <div>

                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="role" id="role" >
                                        <option value="">Select Role</option>
                                        <option value="Agent">Agent</option>
                                        <option value="bookingOfficer">Booking Officer</option>
                                        <option value="FinancialOfficer">Financial Officer</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#a6468c;border-color:#a6468c;">
                                    {{ __('Register') }}
                                </button>
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