
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background:#e025ad;color:white;">Applicant Registion Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header" style="background:#d4aec9;margin:10px;">Applicant form </div>
                    <form method="POST"  action="{{route('insertapplicantinfo')}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label>Please choose your Picture</label>
                                <br>
                                <input type="file" name="cover_image" id="cover_image" class="btn btn-dark"/>
                                    @if ($errors->has('cover_image'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                        </span>
                                    @endif
                                <br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="name" >{{ __('Name of Applicant') }}</label>
                                <input id="name" type="text" placeholder="Enter Name of Applicant " class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="fatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="fatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('fatherName') ? ' is-invalid' : '' }}" name="fatherName" value="{{ old('fatherName') }}" required>
                                @if ($errors->has('fatherName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fatherName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group row"> -->
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="cnicNo">{{ __('CNIC Number') }}</label>
                                <input id="cnicNo" type="text" placeholder="Enter CNIC Number " class="form-control{{ $errors->has('cnicNo') ? ' is-invalid' : '' }}" name="cnicNo" value="{{ old('cnicNo') }}"  required>
                                @if ($errors->has('cnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="passportNo">{{ __('Passport No') }}</label>
                                <input id="passportNo" type="text" placeholder="Enter Passport Number " class="form-control{{ $errors->has('passportNo') ? ' is-invalid' : '' }}" name="passportNo" value="{{ old('passportNo') }}"  required>
                                @if ($errors->has('passportNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('passportNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="mailingAddress">{{ __('Mailing Address') }}</label>
                                <input id="mailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('mailingAddress') ? ' is-invalid' : '' }}" name="mailingAddress" value="{{ old('mailingAddress') }}"  required>
                                @if ($errors->has('mailingAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mailingAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="permanentAddress">{{ __('Permanent Address') }}</label>
                                <input id="permanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}" name="permanentAddress" value="{{ old('permanentAddress') }}"  required>
                                @if ($errors->has('permanentAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('permanentAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="text" placeholder="Enter Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="phoneNO">{{ __('Phone Number') }}</label>
                                <input id="phoneNO" type="text" placeholder="Enter Phone No" class="form-control{{ $errors->has('phoneNO') ? ' is-invalid' : '' }}" name="phoneNO" value="{{ old('phoneNO') }}"  required>
                                @if ($errors->has('phoneNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group row"> -->
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="mobileNo1">{{ __('Mobile Number') }}</label>
                                <input id="mobileNo1" type="text" placeholder="Enter Mobile number" class="form-control{{ $errors->has('mobileNo1') ? ' is-invalid' : '' }}" name="mobileNo1" value="{{ old('mobileNo1') }}"  required>
                                @if ($errors->has('mobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="mobileNo2">{{ __('Phone Number (2)') }}</label>
                                <input id="mobileNo2" type="text" placeholder="Enter Mobile Numhber 2" class="form-control{{ $errors->has('mobileNo2') ? ' is-invalid' : '' }}" name="mobileNo2" value="{{ old('mobileNo2') }}"  required>
                                @if ($errors->has('mobileNo2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--------------- Nominee information ----------------------------------------------------- -->

                        <div class="card-header" style="background:#d4aec9;margin:10px;">Nominee Registion Form</div>
                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeName" >{{ __('Nominee Name') }}</label>
                                <input id="nomineeName" type="text" placeholder="Enter Mominee Name  " class="form-control{{ $errors->has('nomineeName') ? ' is-invalid' : '' }}" name="nomineeName" value="{{ old('nomineeName') }}" required>
                                
                                @if ($errors->has('nomineeName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeFatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="nomineeFatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('nomineeFatherName') ? ' is-invalid' : '' }}" name="nomineeFatherName" value="{{ old('nomineeFatherName') }}" required>
                                @if ($errors->has('nomineeFatherName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeFatherName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group row"> -->
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeCnicNo">{{ __('Nominee CNIC Number') }}</label>
                                <input id="nomineeCnicNo" type="text" placeholder="Enter Mominee CNIC Number " class="form-control{{ $errors->has('nomineeCnicNo') ? ' is-invalid' : '' }}" name="nomineeCnicNo" value="{{ old('nomineeCnicNo') }}"  required>
                                @if ($errors->has('nomineeCnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeCnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePassportNo">{{ __('Passport No') }}</label>
                                <input id="nomineePassportNo" type="text" placeholder="Enter Passport Number " class="form-control{{ $errors->has('nomineePassportNo') ? ' is-invalid' : '' }}" name="nomineePassportNo" value="{{ old('nomineePassportNo') }}"  required>
                                @if ($errors->has('nomineePassportNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineePassportNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="relationWithApplicant">{{ __('Relationship With applicant') }}</label>
                                <input id="relationWithApplicant" type="text" placeholder="Enter Relation With Applicant " class="form-control{{ $errors->has('relationWithApplicant') ? ' is-invalid' : '' }}" name="relationWithApplicant" value="{{ old('relationWithApplicant') }}"  required>
                                @if ($errors->has('relationWithApplicant'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('relationWithApplicant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="nomineeMailingAddress">{{ __('Mailing Address') }}</label>
                                <input id="nomineeMailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('nomineeMailingAddress') ? ' is-invalid' : '' }}" name="nomineeMailingAddress" value="{{ old('nomineeMailingAddress') }}"  required>
                                @if ($errors->has('nomineeMailingAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMailingAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="nomineePermanentAddress">{{ __('Permanent Address') }}</label>
                                <input id="nomineePermanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('nomineePermanentAddress') ? ' is-invalid' : '' }}" name="nomineePermanentAddress" value="{{ old('nomineePermanentAddress') }}"  required>
                                @if ($errors->has('nomineePermanentAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineePermanentAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMail">{{ __('Email') }}</label>
                                <input id="nomineeMail" type="text" placeholder="Enter Email" class="form-control{{ $errors->has('nomineeMail') ? ' is-invalid' : '' }}" name="nomineeMail" value="{{ old('nomineeMail') }}"  required>
                                @if ($errors->has('nomineeMail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMail') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePhoneNo">{{ __('Phone Number') }}</label>
                                <input id="nomineePhoneNo" type="text" placeholder="Enter Phone No" class="form-control{{ $errors->has('nomineePhoneNo') ? ' is-invalid' : '' }}" name="nomineePhoneNo" value="{{ old('nomineePhoneNo') }}"  required>
                                @if ($errors->has('nomineePhoneNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineePhoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div>
                        <div class="form-group row"> -->
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMobileNo1">{{ __('Mobile Number') }}</label>
                                <input id="nomineeMobileNo1" type="text" placeholder="Enter Mobile number" class="form-control{{ $errors->has('nomineeMobileNo1') ? ' is-invalid' : '' }}" name="nomineeMobileNo1" value="{{ old('nomineeMobileNo1') }}"  required>
                                @if ($errors->has('nomineeMobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMobileNo2">{{ __('Phone Number (2)') }}</label>
                                <input id="nomineeMobileNo2" type="text" placeholder="Enter Mobile Numhber 2" class="form-control{{ $errors->has('nomineeMobileNo2') ? ' is-invalid' : '' }}" name="nomineeMobileNo2" value="{{ old('nomineeMobileNo2') }}"  required>
                                @if ($errors->has('nomineeMobileNo2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="propertyId" value="{{$lastId['id']}}">
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg" style="float:right;background-color: rgb(166, 70, 140) !important; color:white;" >
                                        {{ __('Next') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
