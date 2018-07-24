
@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 offset-md-3 offset-lg-3">
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
                   
                    <?php  $applicant = array($applicant);
                           $property = array($property);
                           $payment = array($payment);
                           $seller = array($seller);
                           $review = array($review);
                           $installment = array($installment);
                           $sizeOfInstallmentDates = sizeof($installmentDates);
                           
                        //    var_dump($sizeOfInstallmentDates);
                        //    exit();
                    ?>
                     <div>
                     @foreach($property as $te)
                        <button style="float:right;color:white;" class="btn btn-lg btn-warning" ><a href="{{url('editingform/'.$te->id)}}">Edit</a></button>
                        <a href="{{ url('deleteform/'.$te->id) }}" data-confirm="Are you sure you want to delete?" class="btn btn-lg btn-danger ">Delete</a>
                    </div> 
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Registration Detail</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                        
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
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Picture') }}    :</label>
                                                <img src="../storage/cover_images/{{$te->cover_image}}" height="100" width="100">
                                        </div>
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
                    <legend>Installment Information</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                            @foreach($installment as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('No of Installment') }}    :</label>
                                           <b>{{$te->noOfInstallments}}</b>
                                        </div>
                                       
                                </div>
                                <div class="col-md-6">   
                                       
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Down Payment') }}    :</label>
                                               <b>{{$te->downpayment}}</b>
                                        </div>
                                        
                                </div>            
        
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Amount of Single installment') }}    :</label>
                                               <b>{{$te->amountOfOneInstallment}}</b>
                                    </div>
                                </div>
                                
                            </div>
                           
                                    
                        @endforeach
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Installment Dates</legend>
                        <div class="form-group row">
                            <div class="col-md-6">

                                @foreach($installmentDates as $te)
                                   
                                    <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Installmens DATE ') }}    :</label>
                                        <b>{{$te}}</b>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="col-md-12" style="background-color:#fff; margin-top:20px;">    	
                    <legend>Saller Infromation</legend>
                        <!-- <div class="col-md-12 col-lg-12 col-sm-12">     -->
                            <div class="form-group row">
                                <div class="col-md-6">
                                    @foreach($seller as $te)
                                        <div class="p-3 bg-info mb-2">  <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Saller Name') }}    :</label>
                                           <b>{{$te->sallerName}}</b>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="p-3 bg-info mb-2"> <label for="title" style="margin-top: 5px;margin-left: 10px;">{{ __('Saller CNIC NO.') }}    :</label>
                                               <b>{{$te->sallerFatherName}}</b> 
                                        </div>
                                    @endforeach    
                                </div>        
                            </div>
                                    
                        
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
                           
                   
                     
                    
                    <!-- <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#fff" >
                            <tr>
                                <td>Cash / Pay Order / Cheque / Adjustment</td>
                                <td>In Favor Of</td>
                                <td> Bank Name</td>
                                <td>Total Amount</td>
                                <td>Date</td>
                                <td>Total Payment / Installment </td>
                                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($payment as $te)
                                <td>{{$te->paymentType}}</td>
                                <td>{{$te->transferTo}}</td>
                                <td>{{$te->bankName}}</td>
                                <td>{{$te->propertyPrice}}</td>
                                <td>{{$te->propertyPurchingDate}}</td>
                                <td>{{$te->propertyPaymentProcedure}}</td>
                            </tr>
                        </tbody>
                                @endforeach
                          <h2>Payment info</h2>
                    </table>
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#fff" >
                            <tr>
                                <td>Name</td>
                                <td>Father Name</td>
                                <td> CNIC NO</td>
                                <td>Passport No</td>
                                <td>Mailing Address</td>
                                <td>Permananet Address</td>
                                <td>Email</td>
                                <td>Phone No</td>
                                <td>Mobile NO</td>
                                <td>Mobile No (Option)</td>                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($applicant as $te)
                                <td>{{$te->name}}</td>
                                <td>{{$te->fatherName}}</td>
                                <td>{{$te->cnicNo}}</td>
                                <td>{{$te->passportNo}}</td>
                                <td>{{$te->mailingAddress}}</td>
                                <td>{{$te->permanentAddress}}</td>
                                <td>{{$te->email}}</td>
                                <td>{{$te->phoneNO}}</td>
                                <td>{{$te->mobileNo1}}</td>
                                <td>{{$te->mobileNo2}}</td>
                                
                            </tr>
                        </tbody>
                                @endforeach
                                <h2>Applicant Info</h2>

                              <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#fff" >
                            <tr>
                                <td>Name</td>
                                <td>Father Name</td>
                                <td> CNIC NO</td>
                                <td>Passport No</td>
                                <td>Mailing Address</td>
                                <td>Permananet Address</td>
                                <td>Email</td>
                                <td>Phone No</td>
                                <td>Mobile NO</td>
                                <td>Mobile No (Option)</td>                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($applicant as $te)
                                <td>{{$te->nomineeName}}</td>
                                <td>{{$te->nomineeFatherName}}</td>
                                <td>{{$te->nomineeCnicNo}}</td>
                                <td>{{$te->nomineePassportNo}}</td>
                                <td>{{$te->nomineeMailingAddress}}</td>
                                <td>{{$te->nomineePermanentAddress}}</td>
                                <td>{{$te->nomineeMail}}</td>
                                <td>{{$te->nomineePhoneNo}}</td>
                                <td>{{$te->nomineeMobileNo1}}</td>
                                <td>{{$te->nomineeMobileNo2}}</td>
                                
                            </tr>
                        </tbody>
                                @endforeach
                                <h2>Nominee Info</h2>
                    </table>
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#fff" >
                            <tr>
                                <td>Number of installments </td>
                                <td>Down payment </td>                 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($installment as $te)
                                <td>{{$te->noOfInstallments}}</td>
                                <td>{{$te->downpayment}}</td>
                            </tr>
                        </tbody>
                                @endforeach
                                <h2>installment Info</h2>
                    </table> -->
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
