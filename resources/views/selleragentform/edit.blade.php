@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
        <div>
            <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
        </div> 
        <br>
        <hr>    
        
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;"> User Editing Form </div>

                <div class="card-body">
                    <div><h3> Editing users Information</h3></div>
                    <hr>
                    &nbsp;&nbsp;
                    &nbsp;
                    <?php 
                    // var_dump($users);
                    // echo "<br>";
                    // echo $users['id'];
                    // foreach($users as $te){
                    //     echo $te[0]['id'];
                    // }
                        // exit();
                         
                    ?>
                    <form method="POST"  action="{{ url('usersupdate/'.$users['id'])}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users['name'] }}" required autofocus>

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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users['email'] }}" disabled>

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value= "{{ $users['password'] }}" name="password" required>

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
                                <input id="password-confirm" type="password" class="form-control" value= "{{ $users['password'] }}" name="password_confirmation" required>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="role" id="role" >
                                        <option value="{{ $users['role'] }}">{{ $users['role'] }}</option>
                                        <option value="Agent">Agent</option>
                                        <option value="bookingOfficer">Booking Officer</option>
                                        <option value="FinancialOfficer">Financial Officer</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#f44336;border-color:#f44336; color:white;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                     
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection