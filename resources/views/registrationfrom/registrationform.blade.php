@extends('layouts.app')

@section('content')

<?php 
  $numberOfSellers = sizeof($seller);

?>
<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
            <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;"> Registion Form </div>

                <div class="card-body">
                   
                    <div><h3>Property Information</h3></div>
                    <hr>
                    &nbsp;&nbsp;
                    &nbsp;
                    
                    <form method="POST"  action="{{ url('allformdata')}}" enctype="multipart/form-data" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <label for="propertyType" >{{ __('Registion Project') }} </label>
                               
                                <select class="form-control" name="propertyType" id="propertyType" required>
                                    <option value="">Select Title</option>
                                    <option value="Montviro Hotel">Montviro Hotel</option>
                                    <option value="Montviro Mall">Montviro Mall</option>
                                    <option value="Montviro Theme Park">Montviro Theme Park</option>
                                </select>
                                @if ($errors->has('propertyType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <label for="registrationStatus">{{ __('Registration Status') }} </label>
                               
                                <select class="form-control" name="registrationStatus" id="registrationStatus" required>
                                    <option value="">choice Projecty Status</option>
                                    <option value="First Alottee">First Alottee</option>
                                    <option value="Transfer Certificate">Transfer Certificate</option>
                                    <option value="Open Certificate">Open Certificate</option>
                                </select>
                                @if ($errors->has('registrationStatus'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('registrationStatus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div>
                        <div class="form-group row"> -->
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <label for="propertySection">{{ __('Property Section') }} </label>
                              
                                <select class="form-control" name="propertySection" id="propertySection" required>
                                    <option value="">Choice the Selection</option>
                                    <option value="Office">Office</option>
                                    <option value="Shop">Shop</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Food Court">Food Court</option>
                                    <option value="Kiosk">Kiosk</option>
                                    <option value="Theme Park">Theme Park</option>
                                </select>
                                @if ($errors->has('propertySection'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySection') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyAddress">{{ __('Property Address ( Floor No.)') }}</label>
                                <input id="Property Address" type="number" min="0" placeholder="Enter Floor No, " class="form-control{{ $errors->has('propertyAddress') ? ' is-invalid' : '' }}" name="propertyAddress" value="" required>
                                @if ($errors->has('propertyAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <!-- </div> -->
                        <!-- <div class="form-group row"> -->
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyLocation">{{ __('Property Location (Room No/Shop No.)') }}</label>
                                <input id="propertyLocation" type="number" min="0" placeholder="Enter Property Location (Room No / Shop NO) " class="form-control{{ $errors->has('propertyLocation') ? ' is-invalid' : '' }}" name="propertyLocation" value="" required>
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
                                <input id="propertySize" type="number" placeholder="Enter Property Size  (Sqr ft)" class="form-control{{ $errors->has('propertySize') ? ' is-invalid' : '' }}" name="propertySize" value=""  required>
                                @if ($errors->has('propertySize'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertySize') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="jointProperty">{{ __('Joint Property') }}</label>
                                <!-- <input id="jointProperty" type="text" placeholder="Enter Joint Property" class="form-control{{ $errors->has('jointProperty') ? ' is-invalid' : '' }}" name="jointProperty" value=""  required> -->
                                <select class="form-control" name="jointProperty" id="jointProperty" required>
                                    <option value="No">No</option>
                                    <option value="Yes" disabled>Yes</option>
                                </select>
                                @if ($errors->has('jointProperty'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('jointProperty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                    &nbsp;&nbsp;
                    &nbsp;
                    <div><h3>Applicant Information</h3></div>
                    <hr>
                    
                    
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                            
                            
                                <label>Please choose your Picture</label>
                                <br>
                                <input type="file" name="cover_image" id="cover_image" class="btn btn-danger" style="color:white;"/ required>
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
                                <input id="name" type="text" placeholder="Enter Name of Applicant " class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name" value="" required>
                                
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="fatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="fatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('fatherName') ? ' is-invalid' : '' }}" name="fatherName" value="" required>
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
                                <input id="cnicNo" type="tel" size="15" maxlength="15" placeholder="e.g 6110112345678" class="form-control{{ $errors->has('cnicNo') ? ' is-invalid' : '' }}" name="cnicNo" value=""  pattern="[0-9]{13}" title=" Please match the CNIC No" required>
                              
                                @if ($errors->has('cnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="passportNo">{{ __('Passport No') }} (Optional)</label>
                                <input id="passportNo" type="tel" size="8" maxlength="8" placeholder="e.g ab123456" class="form-control{{ $errors->has('passportNo') ? ' is-invalid' : '' }}" name="passportNo" value=""  >
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
                                <input id="mailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('mailingAddress') ? ' is-invalid' : '' }}" name="mailingAddress" value=""  required>
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
                                <input id="permanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('permanentAddress') ? ' is-invalid' : '' }}" name="permanentAddress" value=""  required>
                                @if ($errors->has('permanentAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('permanentAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="email">{{ __('Email') }} (Optional)</label>
                                <input id="email" type="email" placeholder="Enter Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="" >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="phoneNO">{{ __('Phone Number') }}(Optional)</label>
                                <input id="phoneNO" type="tel" size="16" maxlength="16" placeholder="e.g 051xxxxxxx" class="form-control{{ $errors->has('phoneNO') ? ' is-invalid' : '' }}" name="phoneNO" value=""  >
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
                                
                                <input id="mobileNo1"type="tel" size="13" maxlength="16" placeholder="e.g 923331234567" class="form-control{{ $errors->has('mobileNo1') ? ' is-invalid' : '' }}" name="mobileNo1" value="" pattern="[0-9]{11}" title=" Please match the Mobile No"  required>
                                @if ($errors->has('mobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="mobileNo2">{{ __('Mobile Number (Opt)') }}</label>
                                <input id="mobileNo2"  type="tel" size="13" maxlength="16" placeholder="e.g 923331234567" class="form-control{{ $errors->has('mobileNo2') ? ' is-invalid' : '' }}" name="mobileNo2" value="" >
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
                                <input id="nomineeName" type="text" placeholder="Enter Mominee Name  " class="form-control{{ $errors->has('nomineeName') ? ' is-invalid' : '' }}" name="nomineeName" value="" required>
                                
                                @if ($errors->has('nomineeName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeFatherName">{{ __('S/O,D/O,W/O') }}</label>
                                <input id="nomineeFatherName" type="text" placeholder="Enter father Name " class="form-control{{ $errors->has('nomineeFatherName') ? ' is-invalid' : '' }}" name="nomineeFatherName" value="" required>
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
                                <input id="nomineeCnicNo"  type="tel" size="15" maxlength="15" placeholder="e.g xxxxxxxxxxxxx"  class="form-control{{ $errors->has('nomineeCnicNo') ? ' is-invalid' : '' }}" name="nomineeCnicNo" value="" pattern="[0-9]{13}" title=" Please match the CNIC No"  required>
                                @if ($errors->has('nomineeCnicNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeCnicNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePassportNo">{{ __('Passport No') }}&nbsp;&nbsp;(Optional)</label>
                                <input id="nomineePassportNo"  type="tel" size="8" maxlength="8" placeholder="e.g ab123456" class="form-control{{ $errors->has('nomineePassportNo') ? ' is-invalid' : '' }}" name="nomineePassportNo" value=""  >
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
                                <input id="relationWithApplicant" type="text" placeholder="Enter Relation With Applicant " class="form-control{{ $errors->has('relationWithApplicant') ? ' is-invalid' : '' }}" name="relationWithApplicant" value=""  required>
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
                                <input id="nomineeMailingAddress" type="text" placeholder="Enter Mailing Address " class="form-control{{ $errors->has('nomineeMailingAddress') ? ' is-invalid' : '' }}" name="nomineeMailingAddress" value=""  >
                                @if ($errors->has('nomineeMailingAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMailingAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="nomineePermanentAddress">{{ __('Permanent Address') }}</label>
                                <input id="nomineePermanentAddress" type="text" placeholder="Enter Permanent Address " class="form-control{{ $errors->has('nomineePermanentAddress') ? ' is-invalid' : '' }}" name="nomineePermanentAddress" value=""  >
                                @if ($errors->has('nomineePermanentAddress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineePermanentAddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMail">{{ __('Email') }}</label>
                                <input id="nomineeMail" type="text" placeholder="Enter Email" class="form-control{{ $errors->has('nomineeMail') ? ' is-invalid' : '' }}" name="nomineeMail" value=""  >
                                @if ($errors->has('nomineeMail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMail') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineePhoneNo">{{ __('Phone Number') }}</label>
                                <input id="nomineePhoneNo" type="text" placeholder="Enter Phone No" class="form-control{{ $errors->has('nomineePhoneNo') ? ' is-invalid' : '' }}" name="nomineePhoneNo" value=""  >
                                @if ($errors->has('nomineePhoneNo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineePhoneNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                       
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMobileNo1">{{ __('Mobile Number') }}</label>
                                <input id="nomineeMobileNo1" type="text" placeholder="Enter Mobile number" class="form-control{{ $errors->has('nomineeMobileNo1') ? ' is-invalid' : '' }}" name="nomineeMobileNo1" value=""  >
                                @if ($errors->has('nomineeMobileNo1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo1') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-12">
                                <label for="nomineeMobileNo2">{{ __('Phone Number (2)') }}</label>
                                <input id="nomineeMobileNo2" type="text" placeholder="Enter Mobile Numhber 2" class="form-control{{ $errors->has('nomineeMobileNo2') ? ' is-invalid' : '' }}" name="nomineeMobileNo2" value=""  >
                                @if ($errors->has('nomineeMobileNo2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nomineeMobileNo2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                      
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div><h3>Payment Information</h3></div>
                        <hr>
                    
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="paymentType" >{{ __('Cash / Pay Order / Cheque') }}</label>
                               <!-- <input id="paymentType" type="text" placeholder="Enter Property Payment Type " class="form-control{{ $errors->has('paymentType') ? ' is-invalid' : '' }}" name="paymentType" value="" required> -->
                                 
                                      
                                <select class="form-control" name="paymentType" id="paymentType" onchange="paymenttype(this);" required>
                                    <option value="">choice payment type</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Pay Order">Pay Order</option>
                                    <option value="Cheque">Cheque </option>
                                    
                                </select>

                                @if ($errors->has('paymentType'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paymentType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <!-- add -->
                          
                                <div id="addpayorder">
                                <div><h3>Pay Order Information</h3></div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label for="payorder"> Pay Order </label>
                                            <input id="payorder" type="text" placeholder="Enter Pay Order No" class="form-control" name="chequeno" value="" style="border: 1px solid red;">
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label for="bankName"> Bank Name </label>
                                            <input id="bankName" type="text" placeholder="Enter Bank Name" class="form-control" name="bankName" value="" style="border: 1px solid red;">
                                        
                                    </div>
                                </div>
                                </div>
                                <hr>
                              
                                <div id="addcheque">
                                    <div><h3>Cheque Information</h3></div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label id="chequePayment" for="chequePayment" >Cheque No </label>
                                            <input id="chequePayment" type="text"  placeholder="Enter Cheque No." class="form-control" name="chequeno" value="" style="border: 1px solid red;">
                                        
                                        </div>       
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label for="bankName"> Bank Name </label>
                                            <input id="bankName" type="text" placeholder="Enter Bank Name" class="form-control" name="bankName" value="" style="border: 1px solid red;">
                                        
                                        </div>
                                    </div>
                                </div>


                            <!-- end add -->
                        <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="transferTo">{{ __('In Favor of') }}</label>
                                <input id="transferTo" type="text" placeholder="transferTo " class="form-control{{ $errors->has('transferTo') ? ' is-invalid' : '' }}" name="transferTo" value=" Montviro (Pvt) Ltd." required>
                              
                                @if ($errors->has('transferTo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('transferTo') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>
                        
                        <!-- <div class="form-group row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="bankName">{{ __('Bank Name') }} &nbsp; &nbsp; (Optional)</label>
                                <input id="bankName" type="text" placeholder="Enter bankName " class="form-control{{ $errors->has('bankName') ? ' is-invalid' : '' }}" name="bankName" value="" >
                               
                                @if ($errors->has('bankName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bankName') }}</strong>
                                    </span>
                                @endif
                            </div>
                           
                        </div> -->
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPurchingDate">{{ __('Date') }}</label>
                                <input id="propertyPurchingDate" type="date" placeholder="Enter Date (yyyy-mm-dd) " class="form-control{{ $errors->has('propertyPurchingDate') ? ' is-invalid' : '' }}" name="propertyPurchingDate" value="" required>
                                @if ($errors->has('propertyPurchingDate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPurchingDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="propertyPrice">{{ __('Total Amount') }}</label>
                                <input id="propertyPrice" type="number" min="0" placeholder="Enter Total Amount " class="form-control{{ $errors->has('propertyPrice') ? ' is-invalid' : '' }}" name="propertyPrice" value="" required>
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
                              
                                <select class="form-control" name="propertyPaymentProcedure" id="propertyPaymentProcedure" onchange="paymentProcedure(this);" required>
                                    <option value="">Choice Payment Procedure</option>
                                    <option value="Total Amount">Total Amount</option>
                                    <option value="Installment">Installment</option>
                                    <option value="Token">Token</option>
                                    
                                </select>
                                @if ($errors->has('propertyPaymentProcedure'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPaymentProcedure') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        &nbsp;&nbsp;
                        <div id="addinstallment">
                        <div><h3>Installment Information</h3></div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="">{{ __('No of Installments ') }}</label>
                              
                            
                              
                                  <select id="noOfInstallments" class="form-control" name="noOfInstallments" >
                                    <option value="">Select No of Installments</option>'+
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10" selected="selected">10</option>
                                    
                                </select>
                                @if ($errors->has('propertyPaymentProcedure'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('propertyPaymentProcedure') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="downpayment">Down Payment</label>
                                <input id="downpayment" type="number" min="0" placeholder="Enter down payment" class="form-control" name="downpayment" value="" style="border: 1px solid red;" >
                               
                            </div>
                        </div>
                        </div>
                        <hr>
                        &nbsp;&nbsp;
                        <div id="addtoken">
                        <div><h3>Token Information</h3></div>
                        <div class="form-group row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label id="tokenPayment" for="tokenPayment" >Token Payment </label>
                                <input id="tokenPayment" type="number" min="0" placeholder="Enter Token payment" class="form-control" name="tokenPayment" value="" style="border: 1px solid red;" >
                              
                            </div>       
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <label for="remaningPaymentDate">Remaning Payment Date </label>
                                <input id="remaningPaymentDate" type="Date" placeholder="Enter Remaning Payment Date" class="form-control" name="remaningPaymentDate" value="" style="border: 1px solid red;" >
                               
                            </div>
                        </div>
                        </div>
                            <!-- <div id="addinstallment">
                            
                           
                            </div>
                            <div id="addtoken">
                           
                           
                            </div> -->
                        
                        
                        <!-- <div class="card-header" style="background:#f44336;color:white;margin:10px;">Witness Form</div> -->
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div><h3>Seller Information</h3></div>
                        <hr>
                      
                        <div class="form-group row">    
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                    <label for="witnessName">{{ __('Seller Name') }}</label>
                            
                                        <select class="form-control" name="propertySellerId" id="propertySellerId" required>
                                        <option value="">Select Seller Name</option>
                                        @foreach($seller as $te)
                                               
                                                <option value="{{$te->id}}">{{$te->sallerName}}</option>
                                        @endforeach
                                        </select>
                            </div>
                          
                        </div>
                        
                        <!-- <div class="card-header" style="background:#f44336;color:white;margin:10px;">Review Form</div> -->
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <div><h3>Review</h3></div>
                        <hr>
                        
                        <div class="form-group row">   
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <label for="comment">{{ __('Write your Comments') }}&nbsp; &nbsp; (Optional)</label>
                               
                                <textarea rows="4" cols="100" id="comment" name="comment" placeholder="Enter your comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" ></textarea>
                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>
                        
                       
                        
                        <div class="col-md-12 col-lg-12 col-sm-12" style="margin-top:30px;">
                            <div class="form-group row mb-0">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-lg " style="float:right; background-color:#f44336 !important; color:white;" >
                                        {{ __('Submit') }}
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
<!-- javascript code -->
<script>
// add function to payment type
function paymenttype(val){

    
var paymentType = val.value;

var parent = document.getElementById('addpayorder');
var parent = document.getElementById('addcheque');
    if( paymentType == "Cash"){
      
        document.getElementById("addpayorder").style.display ="none";
        document.getElementById("addcheque").style.display ="none";

    }
    else if( paymentType == "Pay Order"){
        
        document.getElementById("addpayorder").style.display ="block";  
        document.getElementById("addcheque").style.display ="none";
    }
    else if( paymentType == "Cheque"){
        document.getElementById("addcheque").style.display ="block";                               
        document.getElementById("addpayorder").style.display ="none";
    }

return 0;
}
//add fucntion to paymentProcedure 
function paymentProcedure(val){

    
var paymentProcedure = val.value;
var parent = document.getElementById('addinstallment');
var parent = document.getElementById('addtoken');
    if( paymentProcedure == "Total Amount"){

        document.getElementById("addinstallment").style.display ="none";
        document.getElementById("addtoken").style.display ="none";

    }
    else if( paymentProcedure == "Installment"){
        
        document.getElementById("addinstallment").style.display ="block";  
        document.getElementById("noOfInstallments").required = true;
        document.getElementById("downpayment").required = true;
        document.getElementById("addtoken").style.display ="none";
    }
    else if( paymentProcedure == "Token"){
        document.getElementById("addtoken").style.display ="block";
        document.getElementById("tokenPayment").required = true;
        document.getElementById("remaningPaymentDate").required = true;                               
        document.getElementById("addinstallment").style.display ="none";
    }

return 0;
}


</script>

@endsection