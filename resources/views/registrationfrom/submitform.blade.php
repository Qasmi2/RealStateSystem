
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
            <!-- <div class="card">
                <div class="card-header" style="background-color: #f44336;color:white;">Installment From</div> -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12"> -->
            <!-- <div class="card">
                <div class="card-header">Montviro (PVT) Ltd.<br><small>Booking Application Form (Non-refundable)</small></div> -->

                <!-- <div class="card-body"> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php  $applicant = array($applicant);
                           $property = array($property);
                           $payment = array($payment);
                           $witness = array($witness);
                           $review = array($review);
                          
                    ?>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Registration Detail</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                        @foreach($property as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Form Regisration Number') }}    :</label>
                                               
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Registered Project') }}    :</label>
                                               <b>{{$te->propertyType}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Registion Status') }}   :</label>
                                            <b>{{$te->registrationStatus}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">   
                                       
                                       
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Address') }}    :</label>
                                               <b>{{$te->propertyAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Location') }}    :</label>
                                            <b> {{$te->propertyLocation}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Size') }}    :</label>
                                            <b> {{$te->propertySize}}</b>
                                        </div>
                                </div>            
        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Personal Information</legend>
                        <div class="form-group row">
                            <div class="col-md-6">
                            @foreach($applicant as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Name') }}    :</label>
                                                <b>{{$te->name}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Father Name') }}    :</label>
                                               <b>{{$te->fatherName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('CNIC NO.') }}   :</label>
                                            <b>{{$te->cnicNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mailing Address') }}   :</label>
                                            <b>{{$te->mailingAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Permanent Address') }}   :</label>
                                            <b>{{$te->permanentAddress}}</b>
                                        </div>
                            </div>
                                <div class="col-md-6">   

                                        <div class="p-3 bg-info  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Passport No. ') }}   :</label>
                                            <b>{{$te->passportNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Email') }}    :</label>
                                               <b>{{$te->email}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Phone NO.') }}    :</label>
                                            <b> {{$te->phoneNO}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 1') }}    :</label>
                                            <b>{{$te->mobileNo1}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 2 ') }}   :</label>
                                            <b>{{$te->mobileNo2}}</b>
                                        </div>
                                        
                                        
                                </div>            
        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Nominee Information</legend>
                        <div class="form-group row">
                            <div class="col-md-6">
                            @foreach($applicant as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Name') }}    :</label>
                                                <b>{{$te->nomineeName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Father Name') }}    :</label>
                                               <b>{{$te->nomineeFatherName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('CNIC NO.') }}   :</label>
                                            <b>{{$te->nomineeCnicNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mailing Address') }}   :</label>
                                            <b>{{$te->nomineeMailingAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Permanent Address') }}   :</label>
                                            <b>{{$te->nomineePermanentAddress}}</b>
                                        </div>
                            </div>
                                <div class="col-md-6">   

                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Passport No. ') }}   :</label>
                                            <b>{{$te->nomineePassportNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Email') }}    :</label>
                                               <b>{{$te->nomineeMail}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Phone NO.') }}    :</label>
                                            <b> {{$te->nomineePhoneNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 1') }}    :</label>
                                            <b>{{$te->nomineeMobileNo1}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 2 ') }}   :</label>
                                            <b>{{$te->nomineeMobileNo2}}</b>
                                        </div>
                                        
                                        
                                </div>            
        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Payment Infromation</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                            @foreach($payment as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Cash / Pay Order / Cheque / Adjustment') }}    :</label>
                                           <b>{{$te->paymentType}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('In Favor Of') }}    :</label>
                                               <b>{{$te->transferTo}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Bank Name') }}   :</label>
                                            <b>{{$te->bankName}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">   
                                       
                                       
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Total Amount') }}    :</label>
                                               <b>{{$te->propertyPrice}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Date') }}    :</label>
                                            <b>{{$te->propertyPurchingDate}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Total Payment / Installment') }}    :</label>
                                            <b> {{$te->propertyPaymentProcedure}}</b>
                                        </div>
                                </div>            
        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Witness Infromation</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                            @foreach($witness as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Witness Name') }}    :</label>
                                           <b>{{$te->witnessName}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Witness CNIC NO.') }}    :</label>
                                               <b>{{$te->witnessCnicNo}}</b> 
                                        </div>
                                        
                                </div>
                                        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Review</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-12">
                            @foreach($review as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Your Comment') }}    :</label>
                                           <b><br>{{$te->comment}}</b>
                                        </div>
                                </div>
                                        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                  
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
