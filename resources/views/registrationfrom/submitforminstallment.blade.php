
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Montviro (PVT) Ltd.<br><small>Booking Application Form (Non-refundable)</small></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php  $applicant = array($applicant);
                           $property = array($property);
                           $payment = array($payment);
                           $installment = array($installment);
                    ?>
                      <h2>property Info</h2>
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead bgcolor="#fff" >
                            <tr>
                                <td>Form Regisration Number</td>
                                <td>Registered Project</td>
                                <td>Registion Status</td>
                                <td>Property Section</td>
                                <td>Property Address</td>
                                <td>Property Location</td>
                                <td>Property Size</td>
                                <td>joint Property</td>
                                <td>No of Joint property </td>
                                                    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($property as $te)
                                <td>{{$te->id}}</td>
                                <td>{{$te->propertyType}}</td>
                                <td>{{$te->registrationStatus}}</td>
                                <td>{{$te->propertyAddress}}</td>
                                <td>{{$te->propertyLocation}}</td>
                                <td>{{$te->propertySize}}</td>
                                <td>{{$te->jointProperty}}</td>
                                <td>{{$te->noOfJointApplicant}}</td>
                                
                                
                            </tr>
                        </tbody>
                                @endforeach
                     
                    </table>
                    <table class="table table-bordered table-striped table-hover table-responsive">
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
                                <td>Single Installment Amount </td>                 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($installment as $te)
                                <td>{{$te->noOfInstallments}}</td>
                                <td>{{$te->installmentAmount}}</td>
                            </tr>
                        </tbody>
                                @endforeach
                                <h2>installment Info</h2>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
