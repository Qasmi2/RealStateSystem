@extends('layouts.app')
@include('flash')
@section('content')
<?php 
    $property = array($property);
    $payment = array($payment);
    $applicant = array($applicant);
    $installment = array($installment);
    $review = array($review);
    $witness = array($witness);
   
    
   
?>
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;"> Registion Form Updating</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div><h3>Property Information</h3></div>
                    <hr>
                    &nbsp;&nbsp;
                    &nbsp;
                    @foreach($property as $te)
                    <form method="POST"  action="{{ url('updating/'.$te->id)}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyType" >{{ __('Registion Project') }}</label>
                                <input id="propertyType" type="propertyType" placeholder="Enter REGISTERED PROJECT " class="form-control{{ $errors->has('propertyType') ? ' is-invalid' : '' }}" name="propertyType" value="{{$te->propertyType}}" required>
                                 
                                @if ($errors->has('propertyType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="registrationStatus">{{ __('Registration Status') }}</label>
                                <input id="registrationStatus" type="text" placeholder="Select Registration Status " class="form-control{{ $errors->has('registrationStatus') ? ' is-invalid' : '' }}" name="registrationStatus" value="{{$te->registrationStatus}}" required>
                               
                                @if ($errors->has('registrationStatus'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('registrationStatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertySection">{{ __('Property Section') }}</label>
                                <input id="propertySection" type="text" placeholder="Enter property Section " class="form-control{{ $errors->has('propertySection') ? ' is-invalid' : '' }}" name="propertySection" value="{{ $te->propertySection }}"  required>
                                
                                @if ($errors->has('propertySection'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySection') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyAddress">{{ __('Property Address') }}</label>
                                <input id="Property Address" type="text" placeholder="Enter Property Address " class="form-control{{ $errors->has('propertyAddress') ? ' is-invalid' : '' }}" name="propertyAddress" value="{{ $te->propertyAddress}}" >
                                @if ($errors->has('propertyAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyLocation">{{ __('Property Location') }}</label>
                                <input id="propertyLocation" type="text" placeholder="Enter Property Location " class="form-control{{ $errors->has('propertyLocation') ? ' is-invalid' : '' }}" name="propertyLocation" value="{{ $te->propertyLocation }}" >
                                @if ($errors->has('propertyLocation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyLocation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertySize">{{ __('Property Size') }}</label>
                                <input id="propertySize" type="text" placeholder="Enter Property Size  (Sqr ft)" class="form-control{{ $errors->has('propertySize') ? ' is-invalid' : '' }}" name="propertySize" value="{{ $te->propertySize}}"  required>
                                @if ($errors->has('propertySize'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySize') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="jointProperty">{{ __('Joint Property') }}</label>
                                <input id="jointProperty" type="text" placeholder="Enter Joint Property" class="form-control{{ $errors->has('jointProperty') ? ' is-invalid' : '' }}" name="jointProperty" value="{{ $te->jointProperty }}"  required>
                                <!-- <select class="form-control" name="jointProperty" id="jointProperty" >
                                    <option value="No">No</option>
                                    <option value="Yes" disabled>Yes</option>
                                </select> -->
                                @if ($errors->has('jointProperty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jointProperty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        
                
                    @endforeach
                    &nbsp;&nbsp;
                    &nbsp;
                    <div><h3>Applicant Information</h3></div>
                    <hr>
                    @foreach($applicant as $te)
                    
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                            <img src="../storage/cover_images/{{$te->cover_image}}" height="100" width="100">
                            <br>
                                <label>Please choose your Picture</label>
                                <br>
                                <input type="file" name="cover_image" id="cover_image" class="btn btn-primary" style="color:white;"/>
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
                                <input id="name" type="text" placeholder="Enter Name of Applicant " class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name" value="{{ $te->name}}" required>
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="fatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="fatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('fatherName') ? ' is-invalid' : '' }}" name="fatherName" value="{{ $te->fatherName }}" required>
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
                                <input id="cnicNo" type="text" placeholder="Enter CNIC Number " class="form-control{{ $errors->has('cnicNo') ? ' is-invalid' : '' }}" name="cnicNo" value="{{ $te->cnicNo }}"  required>
                                @if ($errors->has('cnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="passportNo">{{ __('Passport No') }}</label>
                                <input id="passportNo" type="text" placeholder="Enter Passport Number " class="form-control{{ $errors->has('passportNo') ? ' is-invalid' : '' }}" name="passportNo" value="{{ $te->passportNo }}"  required>
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
                                <input id="mailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('mailingAddress') ? ' is-invalid' : '' }}" name="mailingAddress" value="{{ $te->mailingAddress}}"  required>
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
                                <input id="permanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}" name="permanentAddress" value="{{ $te->permanentAddress }}"  required>
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
                                <input id="email" type="text" placeholder="Enter Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $te->email }}"  required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="phoneNO">{{ __('Phone Number') }}</label>
                                <input id="phoneNO" type="text" placeholder="Enter Phone No" class="form-control{{ $errors->has('phoneNO') ? ' is-invalid' : '' }}" name="phoneNO" value="{{ $te->phoneNO }}"  required>
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
                                <input id="mobileNo1" type="text" placeholder="Enter Mobile number" class="form-control{{ $errors->has('mobileNo1') ? ' is-invalid' : '' }}" name="mobileNo1" value="{{ $te->mobileNo1 }}"  required>
                                @if ($errors->has('mobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="mobileNo2">{{ __('Phone Number (2)') }}</label>
                                <input id="mobileNo2" type="text" placeholder="Enter Mobile Numhber 2" class="form-control{{ $errors->has('mobileNo2') ? ' is-invalid' : '' }}" name="mobileNo2" value="{{ $te->mobileNo2 }}"  required>
                                @if ($errors->has('mobileNo2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--------------- Nominee information ----------------------------------------------------- -->

                        <!-- <div class="card-header" style="background:#f44336;color:white;margin:10px;">Nominee Registion Form</div> -->
                        &nbsp;&nbsp;&nbsp;
                        <div><h3>Nominee Information</h3></div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeName" >{{ __('Nominee Name') }}</label>
                                <input id="nomineeName" type="text" placeholder="Enter Mominee Name  " class="form-control{{ $errors->has('nomineeName') ? ' is-invalid' : '' }}" name="nomineeName" value="{{ $te->nomineeName }}" required>
                                
                                @if ($errors->has('nomineeName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeFatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="nomineeFatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('nomineeFatherName') ? ' is-invalid' : '' }}" name="nomineeFatherName" value="{{ $te->nomineeFatherName }}" required>
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
                                <input id="nomineeCnicNo" type="text" placeholder="Enter Mominee CNIC Number " class="form-control{{ $errors->has('nomineeCnicNo') ? ' is-invalid' : '' }}" name="nomineeCnicNo" value="{{$te->nomineeCnicNo }}"  required>
                                @if ($errors->has('nomineeCnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeCnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePassportNo">{{ __('Passport No') }}</label>
                                <input id="nomineePassportNo" type="text" placeholder="Enter Passport Number " class="form-control{{ $errors->has('nomineePassportNo') ? ' is-invalid' : '' }}" name="nomineePassportNo" value="{{ $te->nomineePassportNo }}"  required>
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
                                <input id="relationWithApplicant" type="text" placeholder="Enter Relation With Applicant " class="form-control{{ $errors->has('relationWithApplicant') ? ' is-invalid' : '' }}" name="relationWithApplicant" value="{{ $te->relationWithApplicant }}"  required>
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
                                <input id="nomineeMailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('nomineeMailingAddress') ? ' is-invalid' : '' }}" name="nomineeMailingAddress" value="{{ $te->nomineeMailingAddress }}"  required>
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
                                <input id="nomineePermanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('nomineePermanentAddress') ? ' is-invalid' : '' }}" name="nomineePermanentAddress" value="{{ $te->nomineePermanentAddress }}"  required>
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
                                <input id="nomineeMail" type="text" placeholder="Enter Email" class="form-control{{ $errors->has('nomineeMail') ? ' is-invalid' : '' }}" name="nomineeMail" value="{{ $te->nomineeMail }}"  required>
                                @if ($errors->has('nomineeMail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMail') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePhoneNo">{{ __('Phone Number') }}</label>
                                <input id="nomineePhoneNo" type="text" placeholder="Enter Phone No" class="form-control{{ $errors->has('nomineePhoneNo') ? ' is-invalid' : '' }}" name="nomineePhoneNo" value="{{ $te->nomineePhoneNo }}"  required>
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
                                <input id="nomineeMobileNo1" type="text" placeholder="Enter Mobile number" class="form-control{{ $errors->has('nomineeMobileNo1') ? ' is-invalid' : '' }}" name="nomineeMobileNo1" value="{{ $te->nomineeMobileNo1 }}"  required>
                                @if ($errors->has('nomineeMobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMobileNo2">{{ __('Phone Number (2)') }}</label>
                                <input id="nomineeMobileNo2" type="text" placeholder="Enter Mobile Numhber 2" class="form-control{{ $errors->has('nomineeMobileNo2') ? ' is-invalid' : '' }}" name="nomineeMobileNo2" value="{{$te->nomineeMobileNo2 }}"  required>
                                @if ($errors->has('nomineeMobileNo2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                    @endforeach
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div><h3>Payment Information</h3></div>
                        <hr>
                    @foreach($payment as $te)
                   
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="paymentType" >{{ __('Cash / Pay Order / Cheque / Adjustment') }}</label>
                                <input id="paymentType" type="text" placeholder="Enter Property Payment Type " class="form-control{{ $errors->has('paymentType') ? ' is-invalid' : '' }}" name="paymentType" value="{{ $te->paymentType }}" required>
                                 
                                @if ($errors->has('paymentType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paymentType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="transferTo">{{ __('In Favor of') }}</label>
                                <input id="transferTo" type="text" placeholder="transferTo " class="form-control{{ $errors->has('transferTo') ? ' is-invalid' : '' }}" name="transferTo" value=" Montviro (Pvt) Ltd." required>
                              
                                @if ($errors->has('transferTo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('transferTo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="bankName">{{ __('Bank Name') }}</label>
                                <input id="bankName" type="text" placeholder="Enter bankName " class="form-control{{ $errors->has('bankName') ? ' is-invalid' : '' }}" name="bankName" value="{{ $te->bankName }}" >
                               
                                @if ($errors->has('bankName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPurchingDate">{{ __('Date') }}</label>
                                <input id="propertyPurchingDate" type="text" placeholder="Enter Date (yyyy-mm-dd) " class="form-control{{ $errors->has('propertyPurchingDate') ? ' is-invalid' : '' }}" name="propertyPurchingDate" value="{{ $te->propertyPurchingDate }}" >
                                @if ($errors->has('propertyPurchingDate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPurchingDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPrice">{{ __('Total Amount') }}</label>
                                <input id="propertyPrice" type="text" placeholder="Enter Total Amount " class="form-control{{ $errors->has('propertyPrice') ? ' is-invalid' : '' }}" name="propertyPrice" value="{{ $te->propertyPrice }}" required>
                                @if ($errors->has('propertyPrice'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="propertyPaymentProcedure">{{ __('property Payment Procedure') }}</label>
                                <input id="propertyPaymentProcedure" type="text" placeholder="Enter Total Amount " class="form-control{{ $errors->has('propertyPaymentProcedure') ? ' is-invalid' : '' }}" name="propertyPaymentProcedure" value="{{ $te->propertyPaymentProcedure }}" required>
                                <!-- <select class="form-control" name="propertyPaymentProcedure" id="propertyPaymentProcedure" >
                                    <option value="">Choice Payment Procedure</option>
                                    <option value="Installment">Installment</option>
                                    <option value="Total Amount">Total Amount</option>
                                    
                                </select> -->
                                @if ($errors->has('propertyPaymentProcedure'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPaymentProcedure') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- <div class="card-header" style="background:#f44336;color:white;margin:10px;">Witness Form</div> -->
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div><h3>Witness Information</h3></div>
                        <hr>
                        @foreach($witness as $te)
                        <div class="form-group row">    
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="witnessName">{{ __('Witness Name') }}</label>
                                    <input id="witnessName" type="text" placeholder="Enter Witess Name " class="form-control{{ $errors->has('witnessName') ? ' is-invalid' : '' }}" name="witnessName" value="{{ $te->witnessName }}" required>
                                    @if ($errors->has('witnessName'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('witnessName') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                    <label for="witnessCnicNo">{{ __('Witness CNIC NO') }}</label>
                                    <input id="witnessCnicNo" type="text" placeholder="Enter Witness CNIC NO " class="form-control{{ $errors->has('witnessCnicNo') ? ' is-invalid' : '' }}" name="witnessCnicNo" value="{{ $te->witnessCnicNo }}" required>
                                    @if ($errors->has('witnessCnicNo'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('witnessCnicNo') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        @endforeach
                        <!-- <div class="card-header" style="background:#f44336;color:white;margin:10px;">Review Form</div> -->
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div><h3>Review</h3></div>
                        <hr>
                        @foreach($review as $te)
                        <div class="form-group row">   
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="comment">{{ __('Write your Comments') }}</label>
                                <!-- <input  type="text"  placeholder="Enter comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}" > -->
                                <textarea rows="4" cols="100" id="comment" name="comment" placeholder="Enter your comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" >{{ $te->comment }}</textarea>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>
                        @endforeach
                       
                    @endforeach
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div><h3>Installment Info</h3></div>
                        <hr>
                    @foreach($installment as $te)
                        
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="noOfInstallments" >{{ __('Number of Installments') }}</label>
                                 <input  type="text"  placeholder="Enter comment" class="form-control{{ $errors->has('noOfInstallments') ? ' is-invalid' : '' }}" name="noOfInstallments" value="{{$te->noOfInstallments}}" >
                                 
                                @if ($errors->has('noOfInstallments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('noOfInstallments') }}</strong>
                                    </span>
                                @endif
                            </div>       
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="downpayment">{{ __('Down Payment') }}</label>
                                <input id="downpayment" type="number" min="0" placeholder="Enter down payment" class="form-control{{ $errors->has('downpayment') ? ' is-invalid' : '' }}" name="downpayment" value="{{$te->downpayment}}" >
                                @if ($errors->has('downpayment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('downpayment') }}</strong>
                                    </span>
                                @endif
                            </div>                    
                        </div>
                       
                        
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color:#f44336 !important; color:white;" >
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </from>
                    @endforeach    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection