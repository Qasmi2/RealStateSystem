@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
        @include('flash-message')
                        <script>
                                $(document).ready(function() {
                                $('a[data-confirm]').click(function(ev) {
                                var href = $(this).attr('href');
                                if (!$('#dataConfirmModal').length) {
                                $('body').append('<div id="dataConfirmModal" class="modal fade modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog "><div class="modal-content"><div class=" modal-header" style="text-align:center;display:flow-root !important;color:white;background-color: red;" ><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" >Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Delete</a></div></div></div></div>');
                                } 
                                $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
                                $('#dataConfirmOK').attr('href', href);
                                $('#dataConfirmModal').modal({show:true});
                                return false;
                                    });
                            });
                        </script>
                        <!-- End JavaScript code -->
                <!-- <div class="card-body"> -->
                   
                    <?php  $applicant = array($applicant);
                           
                           $property = array($property);
                           foreach($property as $key){
                            $Idkey = $key->id;
                            $sellerId = $key->propertySellerId;
                            }
                          
                           $payment = array($payment);
                            // $seller = array($seller);
                           $review = array($review);
                           $token = array($token);
                           foreach($seller as $te){
                               if( $te->id == $sellerId)
                               {
                                   $sname =  $te->sallerName; 
                                   $sfatherName =  $te->sallerFatherName;
                                   $sdesignation = $te->sallerDesignation;
                                   $scnicNo = $te->sallerCnicNo;
                                   
                               }
                              

                           }
                          
                            
                           
                          
                    ?>
                    <style>
                        .bg-secondary{
                            background-color:#f44336!important;
                            color:white !important;
                        }
                    </style>
                    
                     <div>
                        <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
                        <button style="float:right;color:white;" class="btn btn-lg btn-warning" ><a href="{{url('editingform/'.$Idkey)}}">Edit</a></button>
                        <!-- <button style="float:right;color:white;" class="btn btn-lg btn-danger" data-confirm="Are you sure you want to delete?"><a href="{{url('deleteform/'.$Idkey)}}">Delete</a></button> -->
                        <a href="{{ url('deleteform/'.$Idkey) }}" data-confirm="Are you sure you want to delete?" class="btn btn-lg btn-danger ">Delete</a>
                    </div> 

                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Registration Detail</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                        @foreach($property as $te)
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Form Regisration Number') }}    :</label>
                                               
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Registered Project') }}    :</label>
                                               <b>{{$te->propertyType}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Registion Status') }}   :</label>
                                            <b>{{$te->registrationStatus}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">   
                                       
                                       
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Address (Floor NO.)') }}    :</label>
                                               <b>{{$te->propertyAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Location (ROOM NO. / SHOP NO.') }}    :</label>
                                            <b> {{$te->propertyLocation}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Property Size') }}    :</label>
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
                        
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Picture') }}    :</label>
                                                <img src="{{$te->cover_image}}" height="100" width="100">
                                        </div>
                                      
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Name') }}    :</label>
                                                <b>{{$te->name}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Father Name') }}    :</label>
                                               <b>{{$te->fatherName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('CNIC NO.') }}   :</label>
                                            <b>{{$te->cnicNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mailing Address') }}   :</label>
                                            <b>{{$te->mailingAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Permanent Address') }}   :</label>
                                            <b>{{$te->permanentAddress}}</b>
                                        </div>
                            </div>
                                <div class="col-md-6">   

                                        <div class="p-3 bg-secondary  mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Passport No. ') }}   :</label>
                                            <b>{{$te->passportNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Email') }}    :</label>
                                               <b>{{$te->email}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Phone NO.') }}    :</label>
                                            <b> {{$te->phoneNO}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 1') }}    :</label>
                                            <b>{{$te->mobileNo1}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 2 ') }}   :</label>
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
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Name') }}    :</label>
                                                <b>{{$te->nomineeName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Father Name') }}    :</label>
                                               <b>{{$te->nomineeFatherName}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('CNIC NO.') }}   :</label>
                                            <b>{{$te->nomineeCnicNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mailing Address') }}   :</label>
                                            <b>{{$te->nomineeMailingAddress}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Permanent Address') }}   :</label>
                                            <b>{{$te->nomineePermanentAddress}}</b>
                                        </div>
                            </div>
                                <div class="col-md-6">   

                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Passport No. ') }}   :</label>
                                            <b>{{$te->nomineePassportNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Email') }}    :</label>
                                               <b>{{$te->nomineeMail}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Phone NO.') }}    :</label>
                                            <b> {{$te->nomineePhoneNo}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 1') }}    :</label>
                                            <b>{{$te->nomineeMobileNo1}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Mobile No. 2 ') }}   :</label>
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
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Cash / Pay Order / Cheque / Adjustment') }}    :</label>
                                           <b>{{$te->paymentType}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('In Favor Of') }}    :</label>
                                               <b>{{$te->transferTo}}</b> 
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Bank Name') }}   :</label>
                                            <b>{{$te->bankName}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">   
                                       
                                       
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Total Amount') }}    :</label>
                                               <b>{{$te->propertyPrice}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Date') }}    :</label>
                                            <b>{{$te->propertyPurchingDate}}</b>
                                        </div>
                                        <br>
                                        <div class="p-3 bg-secondary mb-2 "> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Total Payment / Installment') }}    :</label>
                                            <b> {{$te->propertyPaymentProcedure}}</b>
                                        </div>
                                </div>            
        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Token Infromation</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                            @foreach($token as $te)
                                    <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Token Payment') }}    :</label>
                                        <b>{{$te->tokenPayment}}</b>
                                    </div>
                                </div>
                                <div class="col-md-6">                              
                                    <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Remain Payment Data') }}    :</label>
                                            <b>{{$te->remaningPaymentDate}}</b>
                                    </div>
                
                                </div>            
                            </div>
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Seller  Infromation</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                           
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Seller Name') }}    :</label>
                                           <b>{{$sname}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="p-3 bg-secondary mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Seller CNIC NO ') }}    :</label>
                                               <b>{{$sfatherName}}</b> 
                                        </div>
                                        
                                </div>
                                        
                            </div>
                                    
                       
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Review</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-12">
                            @foreach($review as $te)
                                        <div class="p-3 bg-secondary mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Your Comment') }}    :</label>
                                           <b><br>{{$te->comment}}</b>
                                        </div>
                                </div>
                                        
                            </div>
                                    
                        @endforeach
                    </fieldset>
                    <div>
                        <button class="btn btn-lg btn-default" onclick="window.history.go(-1)">Back</button>
                        <button style="float:right;color:white;" class="btn btn-lg btn-warning" ><a href="{{url('editingform/'.$Idkey)}}">Edit</a></button>
                        <!-- <button style="float:right;color:white;" class="btn btn-lg btn-danger" data-confirm="Are you sure you want to delete?"><a href="{{url('deleteform/'.$Idkey)}}">Delete</a></button> -->
                        <a href="{{ url('deleteform/'.$Idkey) }}" data-confirm="Are you sure you want to delete?" class="btn btn-lg btn-danger">Delete</a>
                    </div> 
                      
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
